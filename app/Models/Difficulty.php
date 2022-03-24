<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Difficulty extends Model
{
    use HasFactory;

    protected $guarded = [];

    public const EASY = 'easy';
    public const MEDIUM = 'medium';
    public const HARD = 'hard';

    public function questions()
    {
        return $this->hasMany(Question::class);
    }
}
