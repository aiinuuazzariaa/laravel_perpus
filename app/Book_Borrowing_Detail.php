<?php
namespace App;
use Illuminate\Database\Eloquent\Model;
class Book_Borrowing_Detail extends Model
{
    protected $table = 'book_borrowing_detail';
    public $timestamps = false;
    protected $fillable = ['id_book_borrowing', 'id_book', 'quantity'];
}