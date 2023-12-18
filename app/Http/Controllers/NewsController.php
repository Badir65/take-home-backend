<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\News;

class NewsController extends Controller
{
    public function search(Request $request)
    {
        $searchParams = $request->only(['title', 'author', 'description']);

        $query = News::query();

        foreach ($searchParams as $column => $value) {
            $column = ($column == 'title' || $column == 'description' || $column == 'author') ? $column : 'title';
            $query->where($column, 'LIKE', '%' . $value . '%');
        }

        $results = $query->get();
        return response()->json($results);
    }

    public function getAllNews()
    {
        $news = News::all();
        return response()->json($news);
    }
}