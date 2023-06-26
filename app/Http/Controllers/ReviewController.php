<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Review;

class ReviewController extends Controller
{
    public function halaman(){
        return view('review.read');
    }

    public function index()
    {
        $reviews = Review::with('produk')->get();
        return response()->json(['message' => 'Data berhasil didapatkan',  'data' => $reviews]);
    }

    public function store(Request $request)
    {
        $review = new Review;
        $review->produk_id = $request->produk_id;
        $review->nama = $request->nama;
        $review->review = $request->review;
        $review->save();

       return response()->json(['message' => 'Data baru berhasil ditambahkan',  'data' => $review]);
    }

    public function update(Request $request, $id)
    {


        if($request->input('keyword'))
        {

        $keyword = $request->input('keyword');
        $table = $request->input('table');

        $review = Review::where("$table", '=', "$keyword")
                  ->update([
                    'produk_id' => "$request->produk_id",
                    'nama' => "$request->nama",
                    'review' => "$request->review"
                  ]);

        }else{

            $review = Review::findOrFail($id);
            $review->produk_id = $request->produk_id;
            $review->nama = $request->nama;
            $review->review = $request->review;
            $review->save();
        }


        return response()->json(['message' => 'Data berhasil di update',  'data' => $review]);
    }

    public function destroy(Request $request, $id)
    {
         if($request->input('keyword'))
        {

        $keyword = $request->input('keyword');
        $table = $request->input('table');

        $review = Review::where("$table", '=', "$keyword")->delete();

        }else {
         $review = Review::findOrFail($id);
         $review->delete();
        }

        return response()->json(['message' => 'Data berhasil dihapus']);
    }

     public function search(Request $request)
    {
        $keyword = $request->input('keyword');

        $review = Review::where('nama', 'like', "%$keyword%")
            ->orWhere('review', 'like', "%$keyword%")
            ->orWhere('produk_id', 'like', "%$keyword%")
            ->get();

        return response()->json(['message' => 'Data pencarian ditemukan', 'data' => $review]);

    }

    public function sortBy(Request $request)
    {
        $keyword = $request->input('keyword');
        $format = $request->input('format');

        $review = Review::orderBy("$keyword", "$format")->get();

        return response()->json(['message' => 'Data sort dilakukan', 'data' => $review]);
    }

}
