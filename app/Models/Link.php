<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\HasMany;
use Illuminate\Support\Str;

class Link extends Model
{
    protected $fillable = [
        'user_id',
        'original_link',
        'short_link',
        'clicks',
    ];


    public function user(): BelongsTo
    {
        return $this->belongsTo(User::class);
    }

    public function clicksRelation(): HasMany
    {
        return $this->hasMany(Click::class);
    }

    protected static function boot(): void
    {
        parent::boot();

        static::creating(function (Link $link) {
                $link->short_link = self::generateUniqueShortLink();
        });
    }

    public static function generateUniqueShortLink(int $length = 6): string
    {
        do {
            $shortLink = Str::random($length);
        } while (self::where('short_link', $shortLink)->exists());

        return $shortLink;
    }
}
