<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Str;

class MusicSeeder extends Seeder
{
    public function run(): void
    {
        $albums = DB::table('albums')->pluck('id');

        DB::table('musics')->insert([
            ['id' => 'UUID_MUSIC_1', 'title' => 'Music 1'],
            ['id' => 'UUID_MUSIC_2', 'title' => 'Music 2'],
            ['id' => 'UUID_MUSIC_3', 'title' => 'Music 3'],
        ]);
    }
}

