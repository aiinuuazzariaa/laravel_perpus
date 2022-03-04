<?php
namespace App;
use Illuminate\Database\Eloquent\Model;
class Student extends Model
{
    protected $table = 'student';
    public $timestamps = false;
    protected $fillable = ['student_name', 'date_birth', 'gender', 'address', 'id_class'];
}