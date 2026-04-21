<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Application extends Model
{
    use HasFactory;

    // Kaunse fields database mein direct save ho sakte hain
    protected $fillable = [
        'job_id',
        'full_name',
        'email',
        'resume',
        'cover_letter',
        'user_id',
    ];

    public function job()
    {
       return $this->belongsTo(Job::class);
    }
}