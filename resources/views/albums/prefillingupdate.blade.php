@extends('layouts.app')
@section('content')

    <form method="POST" action="{{route('albums.prefilling.update', $album->id)}}" style="width: 60%;" >
        @csrf
        @method('patch')
        <p>Выберите исполнителя альбома {{$data['title']}}. И мы добавим описание и обложку альбома за вас.</p>
        <select class="form-select" aria-label="Пример выбора по умолчанию" data-live-search="true" name="songwriter">
            @foreach($albums as $album)
                <option value="{{$album->artist}}">{{$album->artist}}</option>
            @endforeach
        </select>
            <input type="text" name="title" value="{{$data['title']}}" style="display: none;">
        <button type="submit" class="btn btn-primary">Добавить инфорицию об альбоме</button>
@endsection
