<?php
namespace App;
use Illuminate\Database\Eloquent\Model;
class Book extends Model
{
    protected $table = 'book';
    public $timestamps = false;
    protected $fillable = ['book_name', 'author', 'description'];
}