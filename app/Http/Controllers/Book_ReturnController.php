<?php
namespace App\Http\Controllers;
use Illuminate\Http\Request;
use App\Book_Return;
use Illuminate\Support\Facades\Validator;
class Book_ReturnController extends Controller
{
public function show(){
        return book_return::all();
    }
    
public function detail($id) 
    {

    if(book_return::where('id_book_return', $id)->exists()) {
        $data = book_return::where('book_return.id_book_return', '=', $id)
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
    'return_date' => 'required',
    'amercement' => 'required'
    ]
    );

    if($validator->fails()) {
        return Response()->json($validator->errors());
    }

    $simpan = book_return::create([
    'id_book_borrowing' => $request->id_book_borrowing,
    'return_date' => $request->return_date,
    'amercement' => $request->amercement
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
    'return_date' => 'required',
    'amercement' => 'required'
    ]
    );

    if($validator->fails()) {
        return Response()->json($validator->errors());
    }
    
    $ubah = book_return::where('id_book_return', $id)->update([
    'id_book_borrowing' => $request->id_book_borrowing,
    'return_date' => $request->return_date,
    'amercement' => $request->amercement
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

    $hapus = book_return::where('id_book_return', $id)->delete();

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