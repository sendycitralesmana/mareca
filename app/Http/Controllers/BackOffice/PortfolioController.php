<?php

namespace App\Http\Controllers\BackOffice;

use App\Models\Portfolio;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Storage;

class PortfolioController extends Controller
{
    public function index()
    {
        $portfolios = Portfolio::orderBy('id', 'desc')->get();

        return view('back-office.project.index', compact('portfolios'));
    }

    public function create(Request $request)
    {
        $request->validate([
            'title' => 'required',
            'description' => 'required',
        ], [
            'title.required' => 'Jasa harus diisi',
            'description.required' => 'Deskripsi harus diisi',
        ]);

        $portfolio = new Portfolio();
        $portfolio->title = $request->title;
        $portfolio->description = $request->description;
        if ($request->file('image')) {
            $file = $request->file('image');
            $path = Storage::disk('s3')->put('portfolio', $file);
            $portfolio->image = $path;
        }
        $portfolio->save();

        return redirect()->back()->with('success', 'Proyek baru ditambahkan');
    }

    public function update(Request $request, $id)
    {
        $request->validate([
            'title' => 'required',
            'description' => 'required',
        ], [
            'title.required' => 'Jasa harus diisi',
            'description.required' => 'Deskripsi harus diisi',
        ]);

        $portfolio = Portfolio::find($id);
        $portfolio->title = $request->title;
        $portfolio->description = $request->description;
        if ($request->file('image')) {
            if ($portfolio->image) {
                Storage::disk('s3')->delete($portfolio->image);
            }
            $file = $request->file('image');
            $path = Storage::disk('s3')->put('portfolio', $file);
            $portfolio->image = $path;
        }
        $portfolio->save();

        return redirect()->back()->with('success', 'Proyek telah diubah');
    }

    public function delete($id)
    {
        $portfolio = Portfolio::find($id);
        if ($portfolio->image) {
            Storage::disk('s3')->delete($portfolio->image);
        }
        $portfolio->delete();

        return redirect()->back()->with('success', 'Proyek telah dihapus');
    }
}
