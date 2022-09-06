@extends('layouts.app')
@section('content')
    <div class="d-grid gap-1 mb-3">
        <a href="{{route('albums.create')}}" class="btn btn-primary" type="button">Добавить альбом</a>
    </div>
    <table class="table table-borderless">
        <thead>
        <tr>
            <th scope="col">#</th>
            <th scope="col">Название</th>
            <th scope="col">Исполнитель</th>
            <th scope="col">Описание</th>
            <th scope="col">Обложка</th>
            <th scope="col">Действия</th>
        </tr>
        </thead>
        <tbody>
        @foreach($albums as $album)
            <tr>
                <th scope="row">{{$album->id}}</th>
                <td>{{$album->title}}</td>
                <td>{{$album->songwriter}}</td>
                <td>{{$album->description}}</td>
                <td><img style="max-width: 200px; max-height: 100px;" class="card-img" src="@if($album->is_api == 0){{asset('storage') . $album->cover}}@else{{$album->cover}}@endif"></td>
                <td>
                    <a href="{{route('albums.edit', $album->id)}}" type="button" class="btn btn-secondary mr-4">Изменить</a>
                    <form action="{{route('albums.delete', $album->id)}}" method="POST" style="display: inline-block;">
                        @csrf
                        @method('delete')
                        <button type="submit" class="btn btn-secondary" value="deleteAlbum">Удалить</button>
                    </form>
                </td>
            </tr>
        @endforeach
        </tbody>
    </table>
    <div class="row">
        {{$albums->links()}}
    </div>
@endsection
