<?php

namespace App\Http\Controllers\FrontOffice;

use App\Models\User;
use App\Models\Service;
use App\Models\Portfolio;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\Blog;
use App\Models\Client;

class HomeController extends Controller
{
    public function index()
    {
        // return redirect('/login');

        $services = Service::orderBy('id', 'asc')->get();
        $portfolios = Portfolio::orderBy('id', 'desc')->get()->take(6);
        $portfoliosC = Portfolio::orderBy('id', 'desc')->get();
        $portfolioDesc = "Proyek Terbaru";
        $blogs = Blog::orderBy('id', 'desc')->get()->take(3);
        $blogsC = Blog::orderBy('id', 'desc')->get();
        $blogDesc = "Blog Terbaru";
        $users = User::where('role_id', '!=', '1')->get();
        $clients = Client::orderBy('id', 'asc')->get();
        return view('front-office.home.index', compact(
            'services', 
            'portfolios', 'portfolioDesc', 'portfoliosC',
            'blogs', 'blogDesc', 'blogsC',
            'users', 
            'clients'
        ));
    }
}
