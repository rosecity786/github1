<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Spatie\Searchable\Searchable;
use Spatie\Searchable\SearchResult;
use Cviebrock\EloquentSluggable\Sluggable;
use RalphJSmit\Laravel\SEO\Support\HasSEO;
use OwenIt\Auditing\Contracts\Auditable;

class Post extends Model implements Auditable
{
    use HasFactory,Sluggable,HasSEO,\OwenIt\Auditing\Auditable;

    public function sluggable(): array
    {
        return [
            'slug' => [
                'source' => 'content'
            ]
        ];
    }

    public function getSearchResult(): SearchResult
    {
        return new \Spatie\Searchable\SearchResult(
           $this,
           $this->title,
        );
    }

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'title',
        'content',
        'published_at',
        'author_id',
    ];

    /**
     * The attributes that should be cast to native types.
     *
     * @var array
     */
    protected $casts = [
        'id' => 'integer',
        'published_at' => 'timestamp',
        'author_id' => 'integer',
    ];

    public function author()
    {
        return $this->belongsTo(User::class);
    }
}
