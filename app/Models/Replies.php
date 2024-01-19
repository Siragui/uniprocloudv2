<?php

namespace App\Models;

use App\Models\User;
use App\Models\Project;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasOne;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Replies extends Model
{
    use HasFactory;

    protected $fillable = [
        'user_id',
        'project_id',
        'body',
        'file',
        'slug',
    ];


    public function user(): BelongsTo
    {
        return $this->belongsTo(User::class);
    }




    public function project(): BelongsTo
    {
        return $this->belongsTo(Project::class, 'project_id');
    }


}
