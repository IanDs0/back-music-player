<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Str;


class AlbumMusicTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        DB::table('albums')->insert([
            ['id' => 'UUID_ALBUM_1', 'name' => 'Album 1'],
            ['id' => 'UUID_ALBUM_2', 'name' => 'Album 2'],
            ['id' => 'UUID_ALBUM_3', 'name' => 'Album 3'],
        ]);
    }
}
