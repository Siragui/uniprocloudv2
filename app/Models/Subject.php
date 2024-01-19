<?php

namespace App\Models;

use App\Models\Course;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Relations\BelongsToMany;


class Subject extends Model
{
    use HasFactory;
    protected $fillable = [

        'course_id',
        'subject',
        'logo',
    ];

    // public function course(): BelongsToMany
    // {
    //     return $this->belongsToMany(Course::class,);
    // }


    public function course(): HasMany
    {
        return $this->hasMany(Course::class,'course_id',
    );
    }


    public $timestamps = false;
}

