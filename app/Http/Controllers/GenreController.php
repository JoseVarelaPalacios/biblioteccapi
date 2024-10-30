<?php

namespace App\Http\Controllers;

use App\Models\Genre;
use Illuminate\Http\Request;

class GenreController extends Controller
{
    public function index()
    {
        $genres = Genre::all();
        return response()->json($genres);
    }

    public function store(Request $request)
    {
        $rules = ['name' => 'required|string|min:1|max:100']; // Corregido
        $validator = \Validator::make($request->input(), $rules);
        if ($validator->fails()) {
            return response()->json([
                'status' => false,
                'errors' => $validator->errors()->all()
            ], 400);
        }
        $genre = new Genre($request->input());
        $genre->save();
        return response()->json([
            'status' => true,
            'message' => 'Genre created successfully'
        ], 200);
    }

    public function show(Genre $genre)
    {
        return response()->json(['status' => true, 'data' => $genre]);
    }

    public function update(Request $request, Genre $genre)
    {
        $rules = ['name' => 'required|string|min:1|max:100']; 
        $validator = \Validator::make($request->input(), $rules);
        if ($validator->fails()) {
            return response()->json([
                'status' => false,
                'errors' => $validator->errors()->all()
            ], 400);
        }
        $genre->update($request->input());
        return response()->json([
            'status' => true,
            'message' => 'Genre updated successfully'
        ], 200);
    }

    public function destroy(Genre $genre)
    {
        $genre->delete();
        return response()->json([
            'status' => true,
            'message' => 'Genre deleted successfully'
        ], 200);
    }
}
