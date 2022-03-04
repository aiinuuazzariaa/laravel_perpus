<?php
namespace App\Http\Controllers;
use Illuminate\Http\Request;
use App\Book_Borrowing;
use Illuminate\Support\Facades\Validator;
class Book_BorrowingController extends Controller
{
public function show()
    {
        return book_borrowing::all();
    }

public function detail($id) 
    {

    if(book_borrowing::where('id_book_borrowing', $id)->exists()) {
        $data = book_borrowing::where('book_borrowing.id_book_borrowing', '=', $id)
        ->get();
        return Response()->json($data);
    }
    
    else {
        return Response()->json(['message' => 'not found' ]);
    }
    }

public function store(Request $request)
    {

    $validator=Validator::make($request->all(),
    [
    'id_student' => 'required',
    'borrow_date' => 'required',
    'return_date' => 'required'
    ]
    );
    
    if($validator->fails()) {
        return Response()->json($validator->errors());
    }

    $simpan = book_borrowing::create([
    'id_student' => $request->id_student,
    'borrow_date' => $request->borrow_date,
    'return_date' => $request->return_date
    ]);

    if($simpan)
    {
        return Response()->json([
            'status' => 1,
            'message' => 'success add data !'
    ]);

    }
    else
    {
        return Response()->json([
            'status' => 0,
            'message' => 'failed add data !'
    ]);
    }
    }

public function update($id, Request $request)
    {

    $validator=Validator::make($request->all(),
    [
    'id_student' => 'required',
    'borrow_date' => 'required',
    'return_date' => 'required'
    ]
    );

    if($validator->fails()) {
        return Response()->json($validator->errors());
    }
    
    $ubah = book_borrowing::where('id_book_borrowing', $id)->update([
    'id_student' => $request->id_student,
    'borrow_date' => $request->borrow_date,
    'return_date' => $request->return_date
    ]);

    if($ubah) {
        return Response()->json([
            'status' => 1,
            'message' => 'success update data !'
    ]);
    }

    else {
        return Response()->json([
            'status' => 0,
            'message' => 'failed update data !'
    ]);
    }
    }

public function destroy($id)
    {

    $hapus = book_borrowing::where('id_book_borrowing', $id)->delete();

    if($hapus) {
        return Response()->json([
            'status' => 1,
            'message' => 'success delete data !'
    ]);
    }

    else {
        return Response()->json([
            'status' => 0,
            'message' => 'failed delete data !'
    ]);
    }
    }
}