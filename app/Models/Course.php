<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Course extends Model
{
    use HasFactory, SoftDeletes ;
    protected $fillable = [
        'name',
        'slug',
        'path_trailer',
     
        'thumbnail',
        'teacher_id',
        'category_id',
    ];

// Suggested code may be subject to a license. Learn more: ~LicenseLog:1330740049.
    public function category()
    {
        return $this->belongsTo(Category::class);
    }

    public function teacher()
    {
        return $this->belongsTo(Teacher::class);
    }

    public function courseVideos()
    {
        return $this->hasMany(CourseVideo::class);
    }

    public function courseKeypoints()
    {
        return $this->hasMany(CourseKeypoint::class);
    }

    public function courseStudents()
    {
        return $this->hasMany(CourseStudent::class);
    }

    public function students()
    {
        return $this->hasMany(User::class, 'course_students');
    }
}
