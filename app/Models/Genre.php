<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

/**
 * Class Genre
 *
 * @package App\Models
 */
class Genre extends Model
{
    /**
     * The attributes that are mass assignable.
     *
     * @var string[]
     */
    protected $fillable = [
        'name',
    ];

    /**
     * Indicates if the model should be timestamped.
     *
     * @var bool
     */
    public $timestamps = false;

    /**
     * Films that belong to the genre.
     */
    public function movies()
    {
        return $this->belongsToMany(Movie::class, 'ganre_movie');
    }
}
