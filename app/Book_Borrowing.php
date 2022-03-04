<?php
namespace App;
use Illuminate\Database\Eloquent\Model;
class Book_Borrowing extends Model
{
    protected $table = 'book_borrowing';
    public $timestamps = false;
    protected $fillable = ['id_student', 'borrow_date', 'return_date'];
}