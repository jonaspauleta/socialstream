<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Laravel\Scout\Searchable;

class Post extends Model
{
    use HasFactory;
    use Searchable;

    protected $fillable = [
        'title',
        'body',
        'category_id',
    ];

    protected $with = [
        'category',
    ];

    public function category()
    {
        return $this->belongsTo(Category::class);
    }

    public function toSearchableArray(): array
    {
        return [
            'title' => $this->title,
            'body' => $this->body,
            'category' => [
                'name' => $this->category->name,
            ],
        ];
    }

    public static function getSearchFilterAttributes(): array
    {
        return [
            'category.name',
            'category.slug',
        ];
    }
}
