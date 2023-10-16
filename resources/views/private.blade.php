@extends('layouts.base')
@section('content')

    <h1 class="h1">файлы для скачивания</h1>
    <div>
        <ul class="list-group">
            @foreach($dirs as $dir)
                <a class="list-group-item list-group-item-action a" href="/Download?file={{$dir}}">{{ str_replace('public/txt/', '', $dir) }}</a>
            @endforeach

            @foreach($files as $file)
                <a class="list-group-item list-group-item-action a" href="/Download?file={{$file}}">{{ str_replace('public/txt/', '', $file) }}</a>
            @endforeach
        </ul>
    </div>
        {{--    <form  method="post" action="/fileup" enctype="multipart/form-data">--}}
        {{--        @csrf--}}
        {{--        <div class="input-group row mt-3">--}}
        {{--            <div class="col">--}}
        {{--            <label for="file1" class="form-label">Выберете фил для загрузки(не более 5м)</label>--}}
        {{--            <input type="file" name="file1" id="file1" class="form-control">--}}
        {{--<input type="submit" class="btn btn-primary">--}}
        {{--            </div>--}}
        {{--        </div>--}}
        {{--    </form>--}}
    <a class="btn btn-primary my-3" href="/logout">Назад</a>
    <button class="arr btn btn-primary n">
        <img src="{{asset('img/arrow-right_icon-icons.com_72375.svg')}}" height="21" width="38">
    </button>
    <button class="arr btn btn-primary b">
        <img src="{{asset('img/arrow-right_icon-icons.com_72375.svg')}}" height="21" width="38">
    </button>
@endsection
