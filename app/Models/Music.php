<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Music extends Model
{
    use HasFactory;

    // Definir a tabela associada ao modelo (opcional se seguir convenção de nomenclatura)
    protected $table = 'musics';

    // Definir os campos que podem ser preenchidos em massa
    protected $fillable = [
        'title',
        'album_id',
    ];

    protected $hidden = ['created_at', 'updated_at', 'pivot'];

    // Definir o tipo de chave primária
    protected $keyType = 'string';
    public $incrementing = false;

    // Definir relacionamento com o modelo Album
    public function album()
    {
        return $this->belongsToMany(Album::class, 'album_music');
    }
}
