<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\Storage;

/**
 * Class Movie
 *
 * @package App\Models
 */
class Movie extends Model
{
    /**
     * The attributes that are mass assignable.
     *
     * @var string[]
     */
    protected $fillable = [
        'name',
        'is_published',
        'image',
    ];

    /**
     * Indicates if the model should be timestamped.
     *
     * @var bool
     */
    public $timestamps = false;

    /**
     * Genres belonging to the film.
     */
    public function genres()
    {
        return $this->belongsToMany(Genre::class, 'ganre_movie');
    }

    /**
     * Return the string value of the is_published field.
     *
     * @return string
     */
    public function getIsPublishedToStringAttribute()
    {
        return $this->is_published ? 'YES' : 'NO';
    }
}
