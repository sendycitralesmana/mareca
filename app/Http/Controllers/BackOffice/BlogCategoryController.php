<?php

namespace App\Http\Controllers\BackOffice;

use App\Http\Controllers\Controller;
use App\Models\BlogCategory;
use Illuminate\Http\Request;

class BlogCategoryController extends Controller
{
    public function index()
    {
        $bCategories = BlogCategory::get();
        return view('back-office.blog-data.category.index', compact('bCategories'));
    }

    public function create(Request $request)
    {
        $request->validate([
            'category' => 'required',
        ], [
            'category.required' => 'Kategori harus diisi',
        ]);

        $bCategory = new BlogCategory();
        $bCategory->category = $request->category;
        $bCategory->save();

        return redirect()->back()->with('success', 'Kategori baru ditambahkan');
    }

    public function update(Request $request, $id)
    {
        $request->validate([
            'category' => 'required',
        ], [
            'category.required' => 'Kategori harus diisi',
        ]);

        $bCategory = BlogCategory::find($id);
        $bCategory->category = $request->category;
        $bCategory->save();

        return redirect()->back()->with('success', 'Kategori telah diubah');
    }

    public function delete($id)
    {
        $bCategory = BlogCategory::find($id);
        $bCategory->blog()->delete();
        $bCategory->delete();
        return redirect()->back()->with('success', 'Kategori telah dihapus');
    }
}
