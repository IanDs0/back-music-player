<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Models\Album;
use App\Models\Music;
use Exception;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Str;

class AlbumController extends Controller
{
    public function index(){
        return Album::with('musics')->get();
    }
    public function store(Request $request){
        DB::beginTransaction();

        try {

            $user = Album::create([
                'id' => Str::uuid(),
                'name' => $request->name,
            ]);

            DB::commit();

            return response()->json([
                'user' => $user,
                'message' => 'Album created successfully!'
            ],201);

        } catch (Exception $e) {
            DB::rollBack();
            return response()->json(['error' => $e->getMessage()], 400);
        }
    }

    public function destroy($id){
        DB::beginTransaction();

        try {

            $album = Album::find($id);

            if(!$album){
                return response()->json(['error' => 'Album not found!'], 404);
            }

            $album->delete();

            DB::commit();

            return response()->json([
                'message' => 'Album deleted successfully!'
            ],200);

        } catch (Exception $e) {
            DB::rollBack();
            return response()->json(['error' => $e->getMessage()], 400);
        }
    }

    public function add_music($album_id, $music_id){
        DB::beginTransaction();

        try {
            $album = Album::find($album_id);

            if(!$album){
                return response()->json(['error' => 'Album not found!'], 404);
            }

            $music = Music::find($music_id);

            if(!$music){
                return response()->json(['error' => 'Music not found!'], 404);
            }

            // Adicionar a música ao álbum sem removê-la de outros álbuns
            $album->musics()->attach($music_id);

            DB::commit();

            return response()->json([
                'message' => 'Music added to album successfully!'
            ], 200);

        } catch (Exception $e) {
            DB::rollBack();
            return response()->json(['error' => 'An error occurred!'], 500);
        }
    }

    public function remove_music($album_id, $music_id){
        DB::beginTransaction();

        try {
            $album = Album::find($album_id);

            if(!$album){
                return response()->json(['error' => 'Album not found!'], 404);
            }

            $music = Music::find($music_id);

            if(!$music){
                return response()->json(['error' => 'Music not found!'], 404);
            }

            // Remover a música do álbum
            $album->musics()->detach($music_id);

            DB::commit();

            return response()->json([
               'message' => 'Music removed from album successfully!'
            ], 200);

        } catch (Exception $e) {
            DB::rollBack();
            return response()->json(['error' => 'An error occurred!'], 500);
        }
    }

    public function show($id)
    {
        $album = Album::with('musics')->findOrFail($id);

        if(!$album){
            return response()->json(['error' => 'Album not found!'], 404);
        }

        return response()->json($album);
    }
}
