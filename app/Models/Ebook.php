<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class Ebook extends Model
{
    use HasFactory;

    protected $fillable = [
        'title',
        'author',
        'publisher',
        'category',
        'description',
        'image',
    ];

    public function author(): BelongsTo
    {
        return $this->belongsTo(Author::class, 'foreign_key');
    }

}
