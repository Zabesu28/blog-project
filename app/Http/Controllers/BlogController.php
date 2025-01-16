<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Blog;
use App\Models\Category;

class BlogController extends Controller
{
    /**
     * Affiche une liste des articles de blog.
     */
    public function index(Request $request)
    {
        $query = Blog::with('category')->orderBy('created_at', 'desc');

        // Filtrer par recherche si le champ "search" est présent
        if ($request->has('search') && $request->input('search') !== null) {
            $search = $request->input('search');
            $query->where('title', 'like', "%{$search}%")
                  ->orWhere('content', 'like', "%{$search}%")
                  ->orWhere('author', 'like', "%{$search}%");
        }
        //$blogs = Blog::with('category')->orderBy('created_at', 'desc')->get();
        $blogs = $query->get(); // Récupère les articles filtrés
        return view('blogs.index', compact('blogs'));
    }

    /**
     * Affiche le formulaire pour créer un nouvel article.
     */
    public function create()
    {
        $categories = Category::all();
        return view('blogs.create', compact('categories'));
    }

    /**
     * Stocke un nouvel article dans la base de données.
     */
    public function store(Request $request)
    {
        $request->validate([
            'title' => 'required|string|max:255',
            'content' => 'required',
            'author' => 'required|string|max:255',
            'category_id' => 'required|exists:categories,id',
            'image' => 'nullable|image|mimes:jpeg,png,jpg|max:2048',
        ]);

        $imagePath = null;
        if ($request->hasFile('image')) {
            $imagePath = $request->file('image')->store('images', 'public');
        }

        Blog::create([
            'title' => $request->title,
            'content' => $request->content,
            'author' => $request->author,
            'category_id' => $request->category_id,
            'image' => $imagePath,
        ]);

        return redirect()->route('blogs.index')->with('success', 'Article créé avec succès !');
    }

    /**
     * Affiche un article spécifique.
     */
    public function show($id)
    {
        $blog = Blog::findOrFail($id);
        return view('blogs.show', compact('blog'));
    }

    /**
     * Affiche le formulaire d'édition pour un article spécifique.
     */
    public function edit($id)
    {
        $blog = Blog::findOrFail($id);
        $categories = Category::all();
        return view('blogs.edit', compact('blog', 'categories'));
    }

    /**
     * Met à jour un article spécifique dans la base de données.
     */
    public function update(Request $request, $id)
    {
        $request->validate([
            'title' => 'required|string|max:255',
            'content' => 'required',
            'author' => 'required|string|max:255',
            'category_id' => 'required|exists:categories,id',
            'image' => 'nullable|image|mimes:jpeg,png,jpg|max:2048',
        ]);

        $blog = Blog::findOrFail($id);

        $imagePath = $blog->image;
        if ($request->hasFile('image')) {
            $imagePath = $request->file('image')->store('images', 'public');
        }

        $blog->update([
            'title' => $request->title,
            'content' => $request->content,
            'author' => $request->author,
            'category_id' => $request->category_id,
            'image' => $imagePath,
        ]);

        return redirect()->route('blogs.index')->with('success', 'Article mis à jour avec succès !');
    }

    /**
     * Supprime un article spécifique de la base de données.
     */
    public function destroy($id)
    {
        $blog = Blog::findOrFail($id);
        $blog->delete();

        return redirect()->route('blogs.index')->with('success', 'Article supprimé avec succès !');
    }
}
