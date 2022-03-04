<?php
namespace App\Http\Controllers;
use Illuminate\Http\Request;
use App\Class1;
use Illuminate\Support\Facades\Validator;
class Class1Controller extends Controller
{
public function show()
    {
        return class1::all();
    }

public function detail($id) 
    {

    if(class1::where('id_class1', $id)->exists()) {
        $data = class1::where('class1.id_class1', '=', $id)
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
    'class_name' => 'required'
    ]
    );

    if($validator->fails()) {
        return Response()->json($validator->errors());
    }

    $simpan = class1::create([
    'class_name' => $request->class_name

    ]);
    if($simpan) {
        return Response()->json([
            'status'=>1, 
            'message'=>'success add data !'
    ]);

    }
    else {
        return Response()->json([
            'status'=>0,
            'message'=>'failed add data !'
    ]);
    }
    }

public function update($id, Request $request)
    {

    $validator=Validator::make($request->all(),
    [
    'class_name' => 'required'
    ]
    );

    if($validator->fails()) {
        return Response()->json($validator->errors());
    }
    
    $ubah = class1::where('id_class1', $id)->update([
    'class_name' => $request->class_name
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
    $hapus = class1::where('id_class1', $id)->delete();

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