<?php

namespace App\Http\Controllers\BackOffice;

use App\Models\Blog;
use App\Models\BlogCategory;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\User;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Facades\Validator;

class BOBlogController extends Controller
{
    public function index(Request $request)
    {
        $qBlog= Blog::orderBy('id', 'desc');
        $users = User::where('role_id', '!=', 1)->get();
        $sCategory = $request->searchCategory;
        $sUser = $request->searchUser;
        
        if ($sCategory) {
            $qBlog->where('blog_category_id', $sCategory);
            $category = Blog::where('id', $sCategory)->first();
        } else {
            $category = null;
        }

        if ($sUser) {
            $qBlog->where('user_id', $sUser);
            $user = User::where('id', $sUser)->first();
        } else {
            $user = null;
        }

        $blogs= $qBlog->get();
        $categories = BlogCategory::get();

        return view('back-office.blog-data.blog.index', compact('blogs', 'categories', 'sCategory', 'category', 'sUser', 'user', 'users'));
    }

    public function detail($id)
    {
        $blog = Blog::find($id);
        return view('back-office.blog-data.blog.detail', compact('blog'));
    }

    public function create(Request $request)
    {
        $request->validate([
            'title' => 'required',
            'content' => 'required',
            'category' => 'required',
        ], [
            'title.required' => 'Judul harus diisi',
            'content.required' => 'Keterangan harus diisi',
            'category.required' => 'Kategori harus diisi',
        ]);

        // $check = Validator::make($request->all(), [
        //     'title' => 'required',
        //     'content' => 'required',
        //     'category' => 'required',
        // ], [
        //     'title.required' => 'Judul harus diisi',
        //     'content.required' => 'Isi harus diisi',
        //     'category.required' => 'Kategori harus diisi',
        // ]);

        // if ($check->fails()) {
        //     return redirect()->back()->with('failAdd', 'Data gagal ditambahkan')->withInput()->withErrors($check);
        // }

        $blog = new blog();
        $blog->title = $request->title;
        $blog->content = $request->content;
        $blog->blog_category_id = $request->category;
        $blog->user_id = auth()->user()->id;
        if ($request->file('image')) {
            $file = $request->file('image');
            $path = Storage::disk('s3')->put('blog', $file);
            $blog->image = $path;
        }
        $blog->save();

        return redirect()->back()->with('success', 'Blog baru ditambahkan');
    }

    public function update(Request $request, $id)
    {
        $request->validate([
            'title' => 'required',
            'content' => 'required',
            'category' => 'required',
        ], [
            'title.required' => 'Judul harus diisi',
            'content.required' => 'Keterangan harus diisi',
            'category.required' => 'Kategori harus diisi',
        ]);

        $blog = blog::find($id);
        $blog->title = $request->title;
        $blog->content = $request->content;
        $blog->blog_category_id = $request->category;
        if ($request->file('image')) {
            if ($blog->image) {
                Storage::disk('s3')->delete($blog->image);
            }
            $file = $request->file('image');
            $path = Storage::disk('s3')->put('blog', $file);
            $blog->image = $path;
        }
        $blog->save();

        return redirect()->back()->with('success', 'Blog telah diubah');
    }

    public function delete($id)
    {
        $blog = blog::find($id);
        if ($blog->image) {
            Storage::disk('s3')->delete($blog->image);
        }
        $blog->delete();
        return redirect()->back()->with('success', 'Blog telah dihapus');
    }
}
