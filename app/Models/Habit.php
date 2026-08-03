<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\HasMany;
use App\Enums\HabitFrequency;

class Habit extends Model
{
    use HasFactory, SoftDeletes;
    protected $fillable = [
        'name',
        'description',
        'frequency',
        'starts_at',
        'ends_at',
    ];

    protected function casts(): array 
    {
        return [
            'frequency' => HabitFrequency::class,
            'starts_at' => 'datetime',
            'ends_at' => 'datetime',
        ];
    }

    // Relations
    public function user(): BelongsTo
    {
        return $this->belongsTo(User::class);
    }

    public function tasks(): HasMany
    {
        return $this->hasMany(Task::class);
    }

    // Object state functions
    public function isActive(): bool
    {
        return now()->between($this->starts_at, $this->ends_at);
    }

    public function isUpcoming(): bool
    {
        return $this->starts_at->isFuture();
    }

    public function isExpired(): bool
    {
        return $this->ends_at->isPast();
    }

    public function scopeActive(Builder $query): Builder
    {
        $now = now();

        return $query
            ->where('starts_at', '<=', $now)
            ->where('ends_at', '>=', $now);
    }

    public function scopeUpcoming(Builder $query): Builder
    {
        return $query
            ->where('starts_at', '>', now());
    }

    public function scopeExpired(Builder $query): Builder
    {
        return $query
            ->where('ends_at', '<', now());
    }

}
