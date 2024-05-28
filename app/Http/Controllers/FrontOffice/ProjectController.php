<?php

namespace App\Http\Controllers\FrontOffice;

use App\Models\Blog;
use App\Models\User;
use App\Models\Client;
use App\Models\Service;
use App\Models\Portfolio;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class ProjectController extends Controller
{
    public function index()
    {
        $portfolios = Portfolio::orderBy('id', 'desc')->paginate(9);
        $portfolioDesc = "Proyek Yang Sudah Dikerjakan";
        $blogsC = Blog::orderBy('id', 'desc')->get();
        $users = User::where('role_id', '!=', '1')->get();
        $services = Service::orderBy('id', 'asc')->get();
        $portfoliosC = Portfolio::orderBy('id', 'desc')->get();
        $clients = Client::orderBy('id', 'asc')->get();
        return view('front-office.project.project-page', compact('portfolios', 'portfolioDesc', 'blogsC', 'users', 'services', 'portfoliosC', 'clients'));
    }
}
