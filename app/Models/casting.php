<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Alert;

class casting extends Model
{
    use HasFactory;
    protected $fillable = ['nama', 'foto', 'jenis_kelamin', 'tanggal_lahir'];
    public $timestamps = true;

    public function movie(){
        return $this->belongsToMany(movie::class, 'casting_movies','id_casting','id_movie');
    }
    public function image()
    {
        if ($this->foto && file_exists(public_path('images/casting/' . $this->foto))) {
            return asset('images/casting/' . $this->foto);
        } else {
            return asset('images/no_image.jpg');
        }
    }
    // mengahupus image(foto) di storage(penyimpanan) public
    public function deleteImage()
    {
        if ($this->foto && file_exists(public_path('images/casting/' . $this->foto))) {
            return unlink(public_path('images/casting/' . $this->foto));
        }
    }

    public static function boot()
    {
        parent::boot();
        self::deleting(function($casting){
            //mengecek apakan casting masih punya movie
            if ($casting->movie->count() > 0 ){
                Alert::error('Gagal Menghapus!', 'Masih Ada Movie Dengan Casting Ini!');
                return false;
            }
            Alert::success('Done', 'Data Berhasil Dihapus!')->autoClose(3000);
        });
    }
}
