<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Alert;

class tahun_rilis extends Model
{
    use HasFactory;
    protected $fillable = ['tahun_rilis'];
    public $timestamps = true;

    public function movie(){
        return $this->hasMany(movie::class, 'id_tahun_rilis');
    }

    public static function boot()
    {
        parent::boot();
        self::deleting(function($tahun_rilis){
            //mengecek apakan tahun_rilis masih punya movie
            if ($tahun_rilis->movie->count() > 0 ){
                Alert::error('Gagal Menghapus!', 'Masih Ada Movie Dengan Tahun Rilis Ini!');
                return false;
            }
            Alert::success('Done', 'Data Berhasil Dihapus!')->autoClose(3000);
        });
    }
}
