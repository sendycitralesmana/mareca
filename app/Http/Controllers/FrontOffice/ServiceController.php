<?php

namespace App\Http\Controllers\FrontOffice;

use App\Models\Blog;
use App\Models\User;
use App\Models\Client;
use App\Models\Service;
use App\Models\Portfolio;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class ServiceController extends Controller
{
    public function index()
    {
        $services = Service::orderBy('id', 'desc')->get();
        $blogsC = Blog::orderBy('id', 'desc')->get();
        $users = User::where('role_id', '!=', '1')->get();
        $services = Service::orderBy('id', 'asc')->get();
        $portfoliosC = Portfolio::orderBy('id', 'desc')->get();
        $clients = Client::orderBy('id', 'asc')->get();
        return view('front-office.service.service-page', compact('services', 'blogsC', 'users', 'services', 'portfoliosC', 'clients'));
    }
}
