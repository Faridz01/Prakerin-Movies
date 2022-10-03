<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class reviewers extends Model
{
    use HasFactory;
    protected $fillable = ['nama','email', 'foto','komentar', 'id_movie'];
    public $timestamps = true;

    public function movie()
    {
        // model reviewers memiliki banyak data
        //dari model movie melaliu fk id_movie
        return $this->belongsTo(Movie::class, 'id_movie');
    }
}
