<?php

namespace App\Http\Controllers\FrontOffice;

use App\Models\Blog;
use App\Models\User;
use App\Models\Client;
use App\Models\Service;
use App\Models\Portfolio;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class AboutController extends Controller
{
    public function index()
    {
        $users = User::where('role_id', '!=', '1')->get();
        $clients = Client::orderBy('id', 'asc')->get();
        $services = Service::orderBy('id', 'asc')->get();
        $portfoliosC = Portfolio::orderBy('id', 'desc')->get();
        $blogsC = Blog::orderBy('id', 'desc')->get();
        return view('front-office.about.about-page', compact('users', 'clients', 'services', 'portfoliosC', 'blogsC'));
    }
}
