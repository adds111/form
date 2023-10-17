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

    <div class="mt-2">
        <button class="arr btn btn-primary b">
            <img src="{{asset('img/arrow-right_icon-icons.com_72375.svg')}}" height="21" width="38">
        </button>
        <button class="arr btn btn-primary mx-2 n">
            <img src="{{asset('img/arrow-right_icon-icons.com_72375.svg')}}" height="21" width="38">
        </button>
    </div>
    <h1 class="h1 mt-3">Загрузка файлов</h1>
    <form  method="post" action="/upload" enctype="multipart/form-data">
        @csrf
        <div class="input-group  row mt-2">
            <div class="col-7">
                <label class="from-label" for="fileName">Введите имя файла</label>
                <input class="form-control" type="text" id="fileName" name="fileName" required>
            </div>
        </div>
        <div class="input-group  row mt-2">
            <div class="col-7">
                <label class="from-label" for="filePath">Введите путь файла(относительный, без слеша в начале)</label>
                <input class="form-control" type="text" id="filePath" name="filePath">
            </div>
        </div>
        <div class="input-group row mt-3">
            <div class="col">
                <label for="file" class="form-label">Выберете файл для загрузки</label>
                <input type="file" name="file" id="file" class="form-control">
                <input type="submit" class="btn btn-primary my-3">
            </div>
        </div>
    </form>
    <div class="row justify-content-center">
        <a class="btn btn-primary my-3 col-5" href="/logout">Выйти из аккаунта</a>
    </div>
@endsection
