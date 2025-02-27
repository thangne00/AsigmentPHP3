<?php

namespace App\Http\Controllers;

use App\Models\Article;
use App\Models\Category;
use Illuminate\Http\Request;

class CategoryController extends Controller
{
    public function show($id)
{
    $category = Category::findOrFail($id);
    $articles = Article::where('category_id', $id)->get();
    return view('categories.show', compact('category', 'articles'));
}

}
