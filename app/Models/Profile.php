<?php

namespace App\Models;

use App\Models\User;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Profile extends Model
{
    use HasFactory;

    protected $table = 'profile_users';
    protected $fillable = [
        'user_id',
        'photo',
        'class',
        'gender',
        'address',
        'number',
    ];



    public function user(): BelongsTo
    {
        return $this->belongsTo(User::class, 'App\Models\User', 'user_id');    }
}
