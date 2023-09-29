<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Post extends Model
{
    use HasFactory;

    protected $guarded = [
        'id',
        'created_at',
        'updated_at',
    ];

    protected $casts = [
        'published_by' => 'integer',
    ];

    public function author()
    {
        return $this->belongsTo(User::class, 'published_by');
    }

    public function scopePublished($query)
    {
        return $query->where('status', 'published');
    }

    public function scopeDraft($query)
    {
        return $query->where('status', 'draft');
    }

    public function scopeFilter($query, array $filters)
    {
        $query->when($filters['search'] ?? false, fn ($query, $search) =>
        $query->where(fn ($query) =>
        $query->where('title', 'like', '%' . $search . '%')
            ->orWhere('excerpt', 'like', '%' . $search . '%')
        )
        );
    }

    public function scopeSort($query, $sort)
    {
        $query->when($sort ?? false, fn ($query, $sort) =>
        $query->orderBy($sort, 'desc')
        );
    }

    public function scopePaginate($query, $paginate)
    {
        $query->when($paginate ?? false, fn ($query, $paginate) =>
        $query->paginate($paginate)
        );
    }

    public function scopeWithAuthor($query)
    {
        $query->when($this->author ?? false, fn ($query, $author) =>
        $query->with('author')
        );
    }

    public function scopeWithComments($query)
    {
        $query->when($this->comments ?? false, fn ($query, $comments) =>
        $query->with('comments')
        );
    }

    public function scopeWithAll($query)
    {
        $query->when($this->all ?? false, fn ($query, $all) =>
        $query->with('author', 'comments')
        );
    }

    public function getRouteKeyName()
    {
        return 'slug';
    }

}
