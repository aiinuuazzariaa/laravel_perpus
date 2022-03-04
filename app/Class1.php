<?php
namespace App;
use Illuminate\Database\Eloquent\Model;
class Class1 extends Model
{
    protected $table = 'class1';
    public $timestamps = false;
    protected $fillable = ['class_name'];
}