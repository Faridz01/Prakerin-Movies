<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class movie extends Model
{
    use HasFactory;
    protected $fillable = ['judul_film', 'sinopsis', 'background', 'cover','durasi', 'id_tahun_rilis',];
    public $timestamps = true;
    // data model movie dimiliki oleh model
    //
    public function tahun_rilis(){
        return $this->belongsTo(tahun_rilis::class, 'id_tahun_rilis');
    }
    //
    //
    public function genre_film(){
        return $this->belongsTo(genre_film::class, 'id_genre');
    }
    public function reviewers(){
        return $this->hasMany(reviewers::class, 'id_movie');
    }
    // model movie bisa memiliki banyak data (n to n)
    // dari model casting melaui table pivot (bantuan)
    // fk id movie dan id casting
    public function casting(){
        return $this->belongsToMany(casting::class, 'casting_movies','id_movie', 'id_casting' );
    }

    public function image()
    {
        if ($this->cover && file_exists(public_path('images/movies/'
            . $this->cover))) {
            return asset('images/movies/' . $this->cover);
        } else {
            return asset('images/no_image.jpg');
        }
    }
    // mengahupus image(cover) di storage(penyimpanan) public
    public function deleteImage()
    {
        if ($this->cover && file_exists(public_path('images/movies/'
            . $this->cover))) {
            return unlink(public_path('images/movies/' . $this->cover));
        }
    }

    public function background()
    {
        if ($this->background && file_exists(public_path('images/movies/'
            . $this->background))) {
            return asset('images/movies/' . $this->background);
        } else {
            return asset('images/no_image.jpg');
        }
    }
    // mengahupus image(background) di storage(penyimpanan) public
    public function deleteBackground()
    {
        if ($this->background && file_exists(public_path('images/movies/'
            . $this->background))) {
            return unlink(public_path('images/movies/' . $this->background));
        }
    }
}
