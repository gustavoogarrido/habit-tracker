<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class Notification extends Model
{
    use HasFactory;
    
    protected $fillable = [
        'notificate_at',
        'sent_at',
    ];

    protected function casts(): array
    {
        return [
            'notificate_at' => 'datetime',
            'sent_at'=> 'datetime',
        ];
    }

    public function user(): BelongsTo
    {
        return $this->belongsTo(User::class);
    }

    public function task(): BelongsTo
    {
        return $this->belongsTo(Task::class);
    }

    public function markAsSent(): void
    {
        if($this->sent_at !== null){
            return;
        }

        $this->update([
            'sent_at'=> now(),
        ]);
    }

    public function markAsNotSent(): void
    {
        if($this->sent_at === null){
            return;
        }

        $this->update([
            'sent_at'=> null,
        ]);
    }

    //inserir os scopes

}
