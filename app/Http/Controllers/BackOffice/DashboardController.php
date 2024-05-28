<?php

namespace App\Http\Controllers\BackOffice;

use App\Models\Blog;
use App\Models\User;
use App\Models\Client;
use App\Models\Service;
use App\Models\Portfolio;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Http\Repository\ClientRepository;

class DashboardController extends Controller
{
    private $clientRepository;

    public function __construct(ClientRepository $clientRepository)
    {
        $this->clientRepository = $clientRepository;
    }

    public function index()
    {
        $users = User::where('role_id', '!=', '1')->get();
        $services = Service::orderBy('id', 'asc')->get();
        $portfolios = Portfolio::orderBy('id', 'asc')->get();
        $blogs = Blog::orderBy('id', 'asc')->get();
        $clients = $this->clientRepository->getAll();
        return view('back-office.dashboard.index', compact(
            'users',
            'services',
            'portfolios',
            'blogs',
            'clients'
        ));
    }
}
