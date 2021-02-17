<?php

namespace App\Http\Controllers;
use Illuminate\Http\Request;
use App\Book;

class BookController extends Controller
{
    public function list_data(Request $request)
    {
        $input = $request->all();
        $users = auth()->user();
        $users = json_decode(json_encode($users), true);
        //dd($users);

        $query = Book::paginate(10);

        $data = [
            'status' => 200,
            'message' => 'Success',
            'data' => $query->toArray()
        ];

        return response()->json($data, $data['status']);
    }
}
