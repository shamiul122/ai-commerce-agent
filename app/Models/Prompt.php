<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Prompt extends Model
{
    protected $fillable = [
        'name',
        'type',
        'prompt_template',
        'provider',
        'status',
    ];
}
