<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Str;

class AlbumSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        DB::table('album_music')->insert([
            ['album_id' => 'UUID_ALBUM_1', 'music_id' => 'UUID_MUSIC_1'],
            ['album_id' => 'UUID_ALBUM_1', 'music_id' => 'UUID_MUSIC_2'],
            ['album_id' => 'UUID_ALBUM_2', 'music_id' => 'UUID_MUSIC_3'],
        ]);
    }
}
