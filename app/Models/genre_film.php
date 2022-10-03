<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Alert;

class genre_film extends Model
{
    use HasFactory;
    protected $fillable = ['kategori'];
    public $timestamps = true;

    public function movie()
    {
        // model GenreFilm memiliki banyak data
        //dari model movie melaliu fk id_genre
        return $this->hasMany(movie::class, 'id_genre');
    }

    public static function boot()
    {
        parent::boot();

        self::deleting(function($genre){
            //mengecek apakan genre masih punya movie
            if ($genre->movie->count() > 0 ){
                Alert::error('Gagal Menghapus' .$genre->name);
                return false;
            }
            Alert::success('Done','Data Berhasil Di Edit');
        });
    }
}
