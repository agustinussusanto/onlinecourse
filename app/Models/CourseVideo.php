<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
// Suggested code may be subject to a license. Learn more: ~LicenseLog:1025820506.
use illuminate\Database\Eloquent\SoftDeletes;

class CourseVideo extends Model
{
// Suggested code may be subject to a license. Learn more: ~LicenseLog:857473140.
    use HasFactory, SoftDeletes;
    protected $fillable = [
        'name',
        'path_video',
        'course_id',
    ];  

    function course()
    {
        return $this->belongsTo(Course::class);
    }           

}
