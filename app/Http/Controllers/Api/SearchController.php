<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Album; // Add this line to import the Album class
use App\Models\Music;

class SearchController extends Controller
{
    public function search(string $name){
        $query = $name;

        if (empty($query)) {
            return response()->json(['message' => 'Name parameter is required'], 400);
        }

        $albums = Album::where('name', 'like', "%$query%")->get();
        $musics = Music::where('title', 'like', "%$query%")->get();

        $resultSearch = [];

        $albums->map(function($album) use (&$resultSearch) {
            $resultSearch[] = [
                'id' => $album->id,
                'name' => $album->name,
                'type' => 'album',
            ];
        });

        $musics->map(function($music) use (&$resultSearch) {
            $resultSearch[] = [
                'id' => $music->id,
                'name' => $music->title,
                'type' => 'music',
            ];
        });

        return response()->json([
            'status' => true,
            'message' => 'Search Musics and Albuns',
            'resultSearch' => $resultSearch,
        ]);
    }

    public function all(){

        $albums = Album::all();
        $musics = Music::all();

        $resultSearch = [];

        $albums->map(function($album) use (&$resultSearch) {
            $resultSearch[] = [
                'id' => $album->id,
                'name' => $album->name,
                'type' => 'album',
            ];
        });

        $musics->map(function($music) use (&$resultSearch) {
            $resultSearch[] = [
                'id' => $music->id,
                'name' => $music->title,
                'type' => 'music',
            ];
        });

        return response()->json([
            'status' => true,
            'message' => 'Search Musics and Albuns',
            'resultSearch' => $resultSearch,
        ]);
    }

}
