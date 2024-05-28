<?php

namespace App\Http\Controllers\FrontOffice;

use App\Models\Blog;
use App\Models\User;
use App\Models\Client;
use App\Models\Service;
use App\Models\Portfolio;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class BlogController extends Controller
{
    public function index()
    {
        $blogs = Blog::orderBy('id', 'desc')->paginate(6);
        $blogsC = Blog::orderBy('id', 'desc')->get();
        $blogDesc = "Blog Yang Sudah Ditulis";
        $users = User::where('role_id', '!=', '1')->get();
        $services = Service::orderBy('id', 'asc')->get();
        $portfoliosC = Portfolio::orderBy('id', 'desc')->get();
        $clients = Client::orderBy('id', 'asc')->get();
        return view('front-office.blog.blog-page', compact('blogs',  'blogsC', 'blogDesc', 'users', 'services', 'portfoliosC', 'clients'));
    }

    public function detail($id)
    {
        $blog = Blog::find($id);
        $blogsC = Blog::orderBy('id', 'desc')->get();
        $users = User::where('role_id', '!=', '1')->get();
        $services = Service::orderBy('id', 'asc')->get();
        $portfoliosC = Portfolio::orderBy('id', 'desc')->get();
        $clients = Client::orderBy('id', 'asc')->get();
        return view('front-office.blog.detail', compact('blog', 'blogsC', 'users', 'services', 'portfoliosC', 'clients'));
    }
}
