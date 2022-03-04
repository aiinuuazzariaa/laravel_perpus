<?php
namespace App\Http\Controllers;
use Illuminate\Http\Request;
use App\Book;
use Illuminate\Support\Facades\Validator;
class BookController extends Controller
{
public function show()
    {
        return book::all();
    }

public function detail($id) 
    {

    if(book::where('id_book', $id)->exists()) {
        $data = book::where('book.id_book', '=', $id)
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
    'book_name' => 'required',
    'author' => 'required',
    'description' => 'required'
    ]
    );
    
    if($validator->fails()) {
        return Response()->json($validator->errors());
    }

    $simpan = book::create([
    'book_name' => $request->book_name,
    'author' => $request->author,
    'description' => $request->description
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
    'book_name' => 'required',
    'author' => 'required',
    'description' => 'required'
    ]
    );

    if($validator->fails()) {
        return Response()->json($validator->errors());
    }
    
    $ubah = book::where('id_book', $id)->update([
    'book_name' => $request->book_name,
    'author' => $request->author,
    'description' => $request->description
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
    $hapus = book::where('id_book', $id)->delete();

    if($hapus) {
        return Response()->json([
            'status' => 1,
            'message' => 'success delete data !'
    ]);
    }

    else {
        return Response()->json([
            'status' => 0,
            'message' => 'failed delete data !d'
    ]);
    }
    }
}