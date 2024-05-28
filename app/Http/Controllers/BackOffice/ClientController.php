<?php

namespace App\Http\Controllers\BackOffice;

use App\Models\Client;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Storage;

class ClientController extends Controller
{
    public function index()
    {
        $clients = Client::orderBy('id', 'desc')->get();

        return view('back-office.client.index', compact('clients'));
    }

    public function create(Request $request)
    {
        $request->validate([
            'client' => 'required',
        ], [
            'client.required' => 'Klien harus diisi',
        ]);

        $client = new Client();
        $client->client = $request->client;
        $client->link = $request->link;
        if ($request->file('image')) {
            $file = $request->file('image');
            $path = Storage::disk('s3')->put('client', $file);
            $client->image = $path;
        }
        $client->save();

        return redirect()->back()->with('success', 'Klien baru ditambahkan');
    }

    public function update(Request $request, $id)
    {
        $request->validate([
            'client' => 'required',
        ], [
            'client.required' => 'Klien harus diisi',
        ]);

        $client = Client::find($id);
        $client->client = $request->client;
        $client->link = $request->link;
        if ($request->file('image')) {
            if ($client->image) {
                Storage::disk('s3')->delete($client->image);
            }
            $file = $request->file('image');
            $path = Storage::disk('s3')->put('client', $file);
            $client->image = $path;
        }
        $client->save();

        return redirect()->back()->with('success', 'Klien telah diubah');
    }

    public function delete($id)
    {
        $client = Client::find($id);
        if ($client->image) {
            Storage::disk('s3')->delete($client->image);
        }
        $client->delete();

        return redirect()->back()->with('success', 'Klien telah dihapus');
    }
}
