<?php

namespace App\Http\Controllers;

use App\Models\Category;
use App\Models\Destination;
use Illuminate\Http\Request;
use Illuminate\View\View;

class PariwisataController extends Controller
{
    public function index(): View {
        $categories = Category::all(); 
        // Mengambil destinasi untuk ditampilkan di home
        $destinations = Destination::all(); 
        return view('welcome', compact('categories', 'destinations'));
    }

    public function store(Request $request) {
        $request->validate([
            'nama_destinasi' => 'required',
            'gambar' => 'required|image|mimes:jpg,png,jpeg',
        ]);
    
        $path = $request->file('gambar')->store('images', 'public');
    
        Destination::create([
            'nama_destinasi' => $request->nama_destinasi,
            'category_id' => $request->category_id,
            'deskripsi_singkat' => $request->deskripsi_singkat,
            'gambar' => $path,
        ]);
    
        return back()->with('success', 'Destinasi berhasil ditambah!');
    }

    public function categoryShow($id) {
        $category = Category::findOrFail($id);
        $destinations = Destination::where('category_id', $id)->get();
        return view('category_detail', compact('category', 'destinations'));
    }

public function adminIndex(Request $request)
{
    // 1. Ambil kata kunci pencarian dari input
    $search = $request->input('search');

    // 2. Query data dengan filter pencarian jika ada kata kunci
    $destinations = \App\Models\Destination::with('category')
        ->when($search, function($query) use ($search) {
            return $query->where('nama_destinasi', 'like', "%{$search}%")
                         ->orWhere('deskripsi_singkat', 'like', "%{$search}%");
        })
        ->latest()
        ->paginate(10)
        ->withQueryString(); // Agar saat pindah halaman pagination, hasil pencarian tidak hilang

    // 3. Ambil semua kategori untuk kebutuhan modal tambah data
    $categories = \App\Models\Category::all();

    // 4. Pastikan folder 'admin' sudah ada dan berisi file 'index.blade.php'
    return view('admin.index', compact('destinations', 'categories', 'search'));
}


    public function edit($id) {
        $dest = Destination::findOrFail($id);
        $categories = Category::all();
        return view('edit_destinasi', compact('dest', 'categories'));
    }

    public function update(Request $request, $id) {
        $dest = Destination::findOrFail($id);
        
        $request->validate([
            'nama_destinasi' => 'required',
            'category_id' => 'required',
        ]);

        $dest->nama_destinasi = $request->nama_destinasi;
        $dest->category_id = $request->category_id;
        $dest->deskripsi_singkat = $request->deskripsi_singkat;

        if ($request->hasFile('gambar')) {
            $path = $request->file('gambar')->store('images', 'public');
            $dest->gambar = $path;
        }

        $dest->save();
        return redirect()->route('admin.index')->with('success', 'Data berhasil diperbarui!');
    }

    public function destroy($id) {
        $dest = Destination::findOrFail($id);
        $dest->delete();
        return back()->with('success', 'Data berhasil dihapus!');
    }

    /** * REVISI: Fungsi allDestinations dengan Logika Search
     */
    public function allDestinations(Request $request)
    {
        // Ambil input keyword dari name="search" di form layout
        $search = $request->input('search');

        // Query dengan filter jika ada search
        $destinations = Destination::with('category')
            ->when($search, function ($query) use ($search) {
                return $query->where('nama_destinasi', 'like', '%' . $search . '%')
                             ->orWhere('deskripsi_singkat', 'like', '%' . $search . '%');
            })
            ->paginate(9)
            ->withQueryString(); // Menjaga parameter search tetap ada saat pindah halaman pagination
        
        return view('destinasi', compact('destinations'));
    }

    public function show($id)
    {
        $dest = Destination::with('category')->findOrFail($id);
        return view('destinasi_detail', compact('dest'));
    }
}