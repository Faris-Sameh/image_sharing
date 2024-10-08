<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\HasMany;

class Post extends Model
{
    use HasFactory;
    protected $fillable=[
        "user_id",
        "image"
    ];
    public function user(): BelongsTo
    {
        return $this->belongsTo(User::class);
    }

    public function likes(): HasMany
    {
        return $this->hasMany(Likes::class);
    }
    public function getImageAttribute($value){
        return asset('storage/images/' . $value);
    }
    public function likeCount()
    {
    return $this->likes()->count();
    }
}
