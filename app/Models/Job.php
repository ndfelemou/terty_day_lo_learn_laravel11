<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\Employer;
use App\Models\Tag;

class Job extends Model
{
    use HasFactory;

    protected $table = 'job_listings';
    // protected $fillable = ['employer_id', 'title', 'salary'];// to allow mass assignment
    protected $guarded = []; // to protect against mass assignment

    public function employer()
    {
        return $this->belongsTo(Employer::class);
    }

    public function tags()
    {
        return $this->belongsToMany(Tag::class, foreignPivotKey: "job_listing_id");
    }
}
