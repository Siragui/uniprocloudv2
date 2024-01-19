<?php

namespace App\Models;

use App\Models\User;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Factories\HasFactory;


class Event extends Model
{
    use HasFactory;

    protected $fillable = [

        'user_id',
        'title',
        'body' ,
        'photo',
        'slug'

    ];

    public function user(): BelongsTo
    {
        return $this->belongsTo(User::class, 'App\Models\User', 'user_id');
    }
}
