<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Job extends Model
{

    use HasFactory;

    protected $fillable = ['title', 'salary', 'employer_id'];

    protected $table = 'job_listings';

    public function employer()
    {
        return $this->belongsTo(Employer::class);
    }

    public function tags()
    {
        return $this->belongsToMany(Tag::class, foreignPivotKey: 'job_listing_id');
    }
}
