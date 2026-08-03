<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\HasMany;
use Illuminate\Database\Eloquent\SoftDeletes;

class Task extends Model
{
    use HasFactory, SoftDeletes;
    protected $fillable = [
        'name',
        'description',
        'notificate',
        'done',
        'done_at',
    ];

    protected function casts(): array
    {
        return [
            'notificate'=> 'boolean',
            'done'=> 'boolean',
            'done_at'=> 'datetime',
        ];
    }

    // Relations
    public function user(): BelongsTo
    {
        return $this->belongsTo(User::class);
    }

    public function habit(): BelongsTo
    {
        return $this->belongsTo(Habit::class);
    }

    public function notifications(): HasMany
    {
        return $this->hasMany(Notification::class);
    }

    public function markAsComplete(): void
    {
        if($this->done && $this->done_at != null){
            return;
        }

        $this->update([
            'done' => true,
            'done_at'=> now(),
        ]);
    }

    public function markAsIncomplete(): void
    {
        if(!($this->done && $this->done_at != null)){
            return;
        }

        $this->update([
            'done'=> false,
            'done_at'=> null,
        ]);
    }
}
