@extends('layouts.base')
@section('content')
    <h1 class="h1">Регистрация</h1>
    <form method="post"  action="/reg" >
          @csrf
        <div class="input-group  row justify-content-center">
            <div class="col-8">
                <label class="from-label" for="login">логин</label>
                <input class="form-control" type="text" id="login" name="login" required >
            </div>
        </div>
        <div class="input-group row justify-content-center">
            <div class="col-8">
                 <label class="from-label" for="password">пароль</label>
                 <input class="form-control" id="password" type="password" name="password" required >
            </div>
        </div>
        <div class="row justify-content-center">
            <div class="col-8">
                <input type="submit" class="btn btn-primary  mt-3">
                <a href="/" class="btn btn-primary mt-3 ">Назад</a>
            </div>
        </div>
    </form>
@endsection
