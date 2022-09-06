<?php
namespace App\Services\Albums;
use App\Models\Album;

class Service
{
    public function store($data)
    {
        Album::create($data);
    }

    public function update($data, $album)
    {
        $message = 'Информация об альбоме №' . $album->id . ' была изменена. Старое название: ' . $album->title  . ' Старый испольнитель: ' . $album->songwriter . ' Старое описание: ' . $album->description . ' Старый путь к обложке: ' . $album->cover;
        $album->update($data);
        return $message;
    }

    public function uploadImg($request)
    {
        if ($request->hasFile('cover'))
        {
            $cover = $request->file('cover');
            $cover->store('upload');
            $data['cover'] = '/upload/' . $cover->hashName();
        }
        return $data['cover'];
    }

    public function prefillingSearch()
    {

    }
}
