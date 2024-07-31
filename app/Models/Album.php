<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Str;

class Album extends Model
{
    use HasFactory;

    // Definir a tabela associada ao modelo (opcional se seguir convenção de nomenclatura)
    protected $table = 'albums';

    // Definir os campos que podem ser preenchidos em massa
    protected $fillable = [
        'name',
    ];

    protected $hidden = ['created_at', 'updated_at'];

    // Definir o tipo de chave primária
    protected $keyType = 'string';
    public $incrementing = false;

    // Definir relacionamento com o modelo Music
    public function musics()
    {
        return $this->belongsToMany(Music::class, 'album_music');
    }

    // Gerar UUID automaticamente ao criar um novo registro
    protected static function boot()
    {
        parent::boot();

        static::creating(function ($model) {
            if (empty($model->{$model->getKeyName()})) {
                $model->{$model->getKeyName()} = (string) Str::uuid();
            }
        });
    }
}
