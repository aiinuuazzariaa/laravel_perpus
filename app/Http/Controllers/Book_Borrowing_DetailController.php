<?php
namespace App\Http\Controllers;
use Illuminate\Http\Request;
use App\Book_Borrowing_Detail;
use Illuminate\Support\Facades\Validator;
class Book_Borrowing_DetailController extends Controller
{
public function show(){
        return book_borrowing_detail::all();
    }
    
public function detail($id) 
    {

    if(book_borrowing_detail::where('id_book_borrowing_detail', $id)->exists()) {
        $data = book_borrowing_detail::where('book_borrowing_detail.id_book_borrowing_detail', '=', $id)
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
    'id_book_borrowing' => 'required',
    'id_book' => 'required',
    'quantity' => 'required'
    ]
    );

    if($validator->fails()) {
        return Response()->json($validator->errors());
    }

    $simpan = book_borrowing_detail::create([
    'id_book_borrowing' => $request->id_book_borrowing,
    'id_book' => $request->id_book,
    'quantity' => $request->quantity
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
    'id_book_borrowing' => 'required',
    'id_book' => 'required',
    'quantity' => 'required'
    ]
    );

    if($validator->fails()) {
        return Response()->json($validator->errors());
    }
    
    $ubah = book_borrowing_detail::where('id_book_borrowing_detail', $id)->update([
    'id_book_borrowing' => $request->id_book_borrowing,
    'id_book' => $request->id_book,
    'quantity' => $request->quantity
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

    $hapus = book_borrowing_detail::where('id_book_borrowing_detail', $id)->delete();

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