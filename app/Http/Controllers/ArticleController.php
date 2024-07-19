<?php

namespace App\Http\Controllers;

use App\Models\Article;
use App\Models\Category;
use Illuminate\Http\Request;

class ArticleController extends Controller
{
    public function index(Request $request)
    {
        $categories = Category::all();
        $categoryId = $request->input('category_id');

        if ($categoryId) {
            $articles = Article::where('category_id', $categoryId)->get();
        } else {
            $articles = Article::all();
        }

        return view('articles.index', compact('articles', 'categories'));
    }

    public function show($id)
    {
        $article = Article::findOrFail($id);
        $categories = Category::all();
        
        // Lấy thể loại của bài viết hiện tại
        $category = $article->category;
        
        // Lấy các bài viết cùng thể loại (trừ bài viết hiện tại)
        $relatedArticles = Article::where('category_id', $category->id)
                                   ->where('id', '!=', $id)
                                   ->get();
                                   
        return view('articles.show', compact('article', 'categories', 'relatedArticles'));
    }
    

    public function store(Request $request)
{
    $validatedData = $request->validate([
        'title' => 'required|max:255',
        'content' => 'required',
        'image_url' => 'nullable|url', 
    ]);

    Article::create($validatedData);

    return redirect()->route('articles.index');
}

    public function search(Request $request)
    {
        $query = $request->input('query');
        $articles = Article::where('title', 'LIKE', "%$query%")
                           ->orWhere('content', 'LIKE', "%$query%")
                           ->get();
        $categories = Category::all();
        return view('articles.index', compact('articles', 'categories'));
    }

}
