<?php

namespace App\Http\Controllers\BackOffice;

use App\Http\Controllers\Controller;
use App\Models\Service;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class ServiceController extends Controller
{
    public function index()
    {
        $services = Service::orderBy('id', 'desc')->get();

        return view('back-office.service.index', compact('services'));
    }

    public function create(Request $request)
    {
        $request->validate([
            'title' => 'required',
            'description' => 'required',
        ], [
            'title.required' => 'Layanan harus diisi',
            'description.required' => 'Deskripsi harus diisi',
        ]);

        $service = new Service();
        $service->title = $request->title;
        $service->description = $request->description;
        $service->link = $request->link;
        if ($request->file('icon')) {
            $file = $request->file('icon');
            $path = Storage::disk('s3')->put('service', $file);
            $service->icon = $path;
        }
        $service->save();

        return redirect()->back()->with('success', 'Layanan baru ditambahkan');
    }

    public function update(Request $request, $id)
    {
        $request->validate([
            'title' => 'required',
            'description' => 'required',
        ], [
            'title.required' => 'Layanan harus diisi',
            'description.required' => 'Deskripsi harus diisi',
        ]);

        $service = Service::find($id);
        $service->title = $request->title;
        $service->description = $request->description;
        $service->link = $request->link;
        if ($request->file('icon')) {
            if ($service->icon) {
                Storage::disk('s3')->delete($service->icon);
            }
            $file = $request->file('icon');
            $path = Storage::disk('s3')->put('service', $file);
            $service->icon = $path;
        }
        $service->save();

        return redirect()->back()->with('success', 'Layanan telah diubah');
    }

    public function delete($id)
    {
        $service = Service::find($id);
        if ($service->icon) {
            Storage::disk('s3')->delete($service->icon);
        }
        $service->delete();

        return redirect()->back()->with('success', 'Layanan telah dihapus');
    }
}
