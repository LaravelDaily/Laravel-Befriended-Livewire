<?php

namespace App\Models;

use Cviebrock\EloquentSluggable\Sluggable;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use Rennokki\Befriended\Contracts\Followable;
use Rennokki\Befriended\Traits\CanBeFollowed;

class Community extends Model implements Followable
{
    use HasFactory, SoftDeletes, Sluggable, CanBeFollowed;

    protected $fillable = ['user_id', 'name', 'description', 'slug'];

    public function topics()
    {
        return $this->belongsToMany(Topic::class);
    }

    /**
     * Return the sluggable configuration array for this model.
     *
     * @return array
     */
    public function sluggable()
    {
        return [
            'slug' => [
                'source' => 'name'
            ]
        ];
    }

    public function getRouteKeyName()
    {
        return 'slug';
    }

    public function posts()
    {
        return $this->hasMany(Post::class);
    }
}
