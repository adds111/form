<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Auth\Events\Validated;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Http\RedirectResponse;
use App\Models\Reg;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Facades\DB;
class RegController extends Controller
{
    public function saveVal(Request $req)
    {
        if (Auth::check()) {
            return redirect()->intended('private');
        }
        $validateVal = $req->validate([
            'login' => 'required|min:4|max:10|alpha_dash|unique:users',
            'password' => 'required|alpha_dash'
        ]);


        $user = User::create($validateVal);

        if ($user) {
            Auth::login($user);
            $files = Storage::Files('public/txt');
            $dirs = Storage::directories('public/txt');
            return view('private' , ['files' => $files, 'dirs' => $dirs]);
        }
        return view('login');
    }
    public function upload(Request $req)
    {
         $req->validate([
            'file' => 'file'
         ]);
         if(Auth::check()){
             $path = Storage::putFileAs('public/txt/'.$req->input('filePath'), $req->file('file') , $req->input('fileName'));
             $files = Storage::Files('public/txt');
             $dirs = Storage::directories('public/txt');
             if ($path) {
                 return view('private', ['files' => $files, 'dirs' => $dirs])->with('success' , 'файл загружен успешно');
             }else{
                 return view('private', ['files' => $files, 'dirs' => $dirs])->withErrors(['formError' => 'ошибка при сохранении файла']);
             }
         }else{
             return view('login')->withErrors(['authError' => 'Ошибка, войдите в систему']);
         }
    }

    public function loginq(Request $req)
    {
        if (Auth::check()) {
            return redirect()->intended('private');
        }
        $validateVal = $req->validate([
            'login' => 'exists:users',
            'password' => 'exists:users'
        ]);
        $id = DB::table('users')->where('login',$req->input('login'))->first();

           if ($validateVal) {
               Auth::loginUsingId($id->id);
               $files = Storage::Files('public/txt');
               $dirs = Storage::directories('public/txt');
               return view('private' , ['files' => $files, 'dirs' => $dirs]);
           }

        return view('login');

    }
    public function download(Request $file)
    {
        if (Auth::check()) {
            $value = $file->input('file');
            if (Storage::exists($value)) {
                if (preg_match('/\./', $value)) {
                    return Storage::download($value);
                } else {
                    $files = Storage::Files($value);
                    $dirs = Storage::directories($value);
                    return view('private', ['files' => $files, 'dirs' => $dirs]);
                }
            }
        }
        else {
        return  view('login');
        }

    }

}
