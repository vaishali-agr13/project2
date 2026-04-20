<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Job extends Model
{
    use HasFactory;

    // Kaunse fields database mein direct save ho sakte hain
    protected $fillable = [
        'title',
        'category',
        'company_name',
        'company_email',
        'location',
        'salary_min',
        'salary_max',
        'posted_by_type',
        'description',
        'job_type',
        'status',
        'experience'
    ];

    public function categoryData()
    {
      return $this->belongsTo(Category::class, 'category', 'id');
    }
}