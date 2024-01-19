<?php

namespace App\Models;

use App\Models\User;
use App\Models\Replies;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Project extends Model
{
    use HasFactory;

    protected $fillable = [
        'user_id',
        'title',
        'body' ,
        'pdf',
        'slug',
        'date_limite',

    ];

    public function user(): BelongsTo
    {
        return $this->belongsTo(User::class);
    }



    public function reply(): HasMany
    {
        return $this->hasMany(Replies::class);
    }
}
