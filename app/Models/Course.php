<?php

namespace App\Models;

use App\Models\User;
use App\Models\Subject;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Relations\BelongsToMany;

class Course extends Model
{
    use HasFactory;
    protected $fillable = [

        'user_id',
        'title',
        'body' ,
        'pdf',
        'logo',
        'slug',
    ];

    public function user(): BelongsTo
    {
        return $this->belongsTo(User::class);
    }


    // public function subject(): BelongsToMany
    // {
    //     return $this->belongsToMany(Subject::class);
    // }



    // public function subject(): HasMany
    // {
    //     return $this->hasMany(Subject::class);
    // }

}

