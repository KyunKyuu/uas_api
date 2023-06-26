<?php

namespace App\Http\Controllers;

use App\Models\Produk;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Response;
use Illuminate\Support\Facades\Storage;

class ProdukController extends Controller
{

    public function index()
    {
        $produks = Produk::get();
        $convertJson = response()->json($produks);

        if (request()->wantsJson()) {
            return $convertJson;
        }

        return Response::view('index', ['produk' => $convertJson->getContent()]);
    }


    public function produkRead(){
         $produks = Produk::get();
        $convertJson = response()->json($produks);

        if (request()->wantsJson()) {
            return $convertJson;
        }

        return Response::view('produk.read', ['produk' => $convertJson->getContent()]);
    }


    public function create()
    {
         return Response::view('produk.create');
    }


    public function store(Request $request)
    {
        $validatedData = $request->validate([
        'nama' => 'required',
        'deskripsi' => 'required',
        'harga' => 'required',
        'kategori' => 'required',
        'gambar' => 'nullable|image|mimes:jpeg,png,jpg,gif|max:2048',
    ]);


       if ($request->hasFile('gambar')) {
            $gambarPath = $request->file('gambar')->store('produk', 'public');
       } else {
            $gambarPath = null;
       }


        $produk = Produk::create([
            'nama' => $validatedData['nama'],
            'deskripsi' => $validatedData['deskripsi'],
            'harga' => $validatedData['harga'],
            'kategori' => $validatedData['kategori'],
            'gambar' => $gambarPath,
        ]);

        $convertJson = response()->json($produk);

        if (request()->wantsJson()) {
            return $convertJson;
        }

    return redirect()->to('/');

    }

    public function show($id)
    {
        $produk = Produk::where('id',$id)->first();
        $produks = Produk::latest()->take(4)->get();


        $convertJson = response()->json($produk);
        $convertJsons = response()->json($produks);

        if (request()->wantsJson()) {
            return $convertJson;
        }

        return Response::view('produk.show', ['produk' => $convertJson->getContent(),'produks' => $convertJsons->getContent()]);
    }


    public function edit($id)
    {

        $produk = Produk::findOrFail($id);

        return view('produk.edit', compact('produk'));
    }


    public function update(Request $request, $id)
    {

    $produk = Produk::findOrFail($id);
    $data = $request->all();


    if ($request->hasfile('gambar')) {

        Storage::disk('public')->delete($produk->gambar);

        $gambarPath = $request->file('gambar')->store('produk', 'public');
        $data['gambar'] = $gambarPath;
    }else{
        $data['gambar'] = $produk->gambar;
    }

    $produk->update($data);

    $convertJson = response()->json($produk);

    if (request()->wantsJson()) {
        return $convertJson;
    }

     return redirect()->to('/');
    }


    public function destroy($id)
    {
        $produk = Produk::findOrFail($id);
        $produk->delete();

        $convertJson = response()->json();

        if (request()->wantsJson()) {
            return $convertJson;
        }

        return back();
    }

    public function search(Request $request)
    {
        $keyword = $request->input('keyword');

        $produk = Produk::where('nama', 'like', "%$keyword%")
            ->orWhere('harga', 'like', "%$keyword%")
            ->orWhere('kategori', 'like', "%$keyword%")
            ->get();

        $convertJson = response()->json($produk);

        if (request()->wantsJson()) {
            return $convertJson;
        }

        return Response::view('index', ['produk' => $convertJson->getContent()]);
    }
}
