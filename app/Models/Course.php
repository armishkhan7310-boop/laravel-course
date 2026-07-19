<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\Student;

class Course extends Model
{
    use HasFactory;

    public function courseRelation()
{
    return $this->belongsTo(Course::class, 'course_id');
}
}