@extends('layouts.app')
@section('content')
    <form method="POST" action="{{route('albums.update', $album->id)}}" enctype="multipart/form-data" style="width: 60%;" >
        @csrf
        @method('patch')
        <div class="row mb-3">
            <label for="inputEmail3" class="col-sm-2 col-form-label">Название альбома</label>
            <div class="col-sm-10">
                <input type="text" class="form-control" id="inputEmail3" name="title" value="{{$album->title}}">
            </div>
            @error('title')
            <p class="text-danger">{{$message}}</p>
            @enderror
        </div>
        <div class="row mb-3">
            <label for="inputPassword3" class="col-sm-2 col-form-label">Исполнитель</label>
            <div class="col-sm-10">
                <input type="text" class="form-control" id="inputPassword3" name="songwriter" value="{{$album->songwriter}}">
            </div>
            @error('songwriter')
            <p class="text-danger">{{$message}}</p>
            @enderror
        </div>
        <div class="row mb-3">
            <label for="inputPassword3" class="col-sm-2 col-form-label">Описание</label>
            <div class="col-sm-10">
                <input type="text" class="form-control" id="inputPassword3" name="description" value="{{$album->description}}">
            </div>
            @error('description')
            <p class="text-danger">{{$message}}</p>
            @enderror
        </div>
        <div class="row mb-3">
            <label for="inputPassword3" class="col-sm-2 col-form-label">Обложка</label>
            <div class="col-sm-10">
                <input type="file" class="form-control" id="inputPassword3" name="cover">
            </div>
            @error('cover')
            <p class="text-danger">{{$message}}</p>
            @enderror
        </div>
        <button type="submit" class="btn btn-primary">Обновить альбом</button>
        <div class="col-sm-10 mt-5">
            <input class="btn btn-primary" type="submit" formaction="{{route('albums.prefillingedit', $album)}}" value="Предзаполнение полей по полю Название альбома">
        </div>
    </form>
@endsection
