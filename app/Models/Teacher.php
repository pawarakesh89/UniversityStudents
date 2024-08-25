<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Teacher extends Model
{
    use HasFactory, SoftDeletes;

    protected $fillable = ['name'];

    public function students()
    {
        return $this->hasMany(Student::class, 'class_teacher_id');
    }
}
