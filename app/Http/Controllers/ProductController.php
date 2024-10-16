<?php

namespace App\Http\Controllers;

use Exception;
use App\Models\Product;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\File;
use App\Models\ProductImage;

class ProductController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $data['products'] = Product::get();
        return view('admin.product.index', $data);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('admin.product.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        try{
            $path = 'files/product/images/';

            Product::create([
                'name' => $request->name,
                'desc' => $request->desc,
                'price' => $request->price,
                'qty' => $request->qty,
            ]);

            // Looping semua inputan dengan attribut bernama files
            foreach($request->file('file') ?? [] as $key => $item){
                $filename[$key] = $item->getClientOriginalName();
                ProductImage::create([
                    'product_id'    => $product->id,
                    'file'    => $path.$fileName[$key]
                ]);
            }

            // Illuminate\Support\Facades\File
            if(count ($request->allFiles())>0){
            // Untuk mengecek apakah path folder sudah ada, jika belum maka akan
            // membuat folder files/product/images/
            if(!File::isDirectory($path)) File::makeDirectory($path, 0755, true, true);

            foreach($request->file('file') ?? [] as $key => $file){
                $file->move($path, $fileName[$key]);
            }
            }
        }catch(Exception $e){
            return redirect()->route('product.index')
            ->with('error', 'Gagal Membuat Data Produk! Alasan : '. $e->getMessage());
        }

        return redirect()->route('product.index')
        ->with('success', 'Berhasil Membuat Data Produk!');
    }
        
    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        $data['product'] = Product::find($id);
        return view('admin.product.edit', $data);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        $product = Product::find($id);

        $product -> update([
            'name' => $request->name,
            'desc' => $request->desc,
            'price' => $request->price,
            'qty' => $request->qty,
        ]);

        return redirect()->route('product.index')
                ->with('success', 'Berhasil Mengupdate Data Produk!');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        Product::find($id)->delete();

        return redirect()->route('product.index')
                ->with('success', 'Berhasil Menghapus Data Produk!');
    }
}
