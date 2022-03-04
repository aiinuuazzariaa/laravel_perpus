<?php
namespace App;
use Illuminate\Database\Eloquent\Model;
class Book_Return extends Model
{
    protected $table = 'book_return';
    public $timestamps = false;
    protected $fillable = ['id_book_borrowing', 'return_date', 'amercement']; 
}