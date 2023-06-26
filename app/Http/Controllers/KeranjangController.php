<?php

namespace App\Http\Controllers;


use App\Models\Keranjang;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Response;

class KeranjangController extends Controller
{
    public function index(){
       $keranjang = Keranjang::with('produk')->get();
       return response()->json($keranjang);
    }

    public function halaman(){
        return Response::view('keranjang.read');
    }

    public function store(Request $request) {


        $keranjang = Keranjang::create([
            'produk_id' => $request->produk_id,
            'jumlah' => 1
        ]);

        $convertJson = response()->json($keranjang);

        if (request()->wantsJson()) {
            return $convertJson;
        }

        return back();
    }

    public function destroy($id){

        $keranjang = Keranjang::findOrFail($id);
        $keranjang->delete();

        return response()->json(['message' => 'Data keranjang berhasil dihapus']);
    }

}
