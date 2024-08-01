<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Models\Music;
use Exception;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Str;

class MusicController extends Controller
{
    public function store (Request $request){
        DB::beginTransaction();

        try {

            $music = Music::create([
                'id' => Str::uuid(),
                'title' => $request->title,
            ]);

            DB::commit();

            return response()->json([
                'music' => $music,
                'message' => 'Music created successfully!'
            ],201);

        } catch (Exception $e) {
            DB::rollBack();
            return response()->json(['error' => $e->getMessage()], 400);
        }
    }

    public function destroy($id){
        DB::beginTransaction();

        try {

            $music = Music::find($id);

            if(!$music){
                return response()->json(['error' => 'Music not found!'], 404);
            }

            $music->delete();

            DB::commit();

            return response()->json([
                'message' => 'Music deleted successfully!'
            ],200);

        } catch (Exception $e) {
            DB::rollBack();
            return response()->json(['error' => $e->getMessage()], 400);
        }
    }
}
