<?php

namespace App\Http\Controllers;

use Error;
use Dotenv\Validator;
use App\Models\Product;
use App\Models\Category;
use Illuminate\Http\Request;
use App\Http\Traits\ImagesTrait;

use function PHPUnit\Framework\isNull;
use function PHPUnit\Framework\isEmpty;
use RealRashid\SweetAlert\Facades\Alert;

class ProductController extends Controller {
    use ImagesTrait;
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index() {
        $products = Product::get();
        return view('Admin.product.index', compact('products'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create() {
        $categories = Category::get();
        return view('Admin.product.addproduct', compact('categories'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request) {
        // dd($request);
        $request->validate([
            'name' => 'required',
            'price' => 'required',
            'quantity' => 'integer',
            'photo' => 'required|image|mimes:jpeg,png,jpg,gif,svg|max:2048',
        ]);
        $imageName = time() . '_product' . '.' . $request->photo->getClientOriginalExtension();
        $this->uploadImage($request->photo, $imageName, '/productsImage//');
        Product::create([
            'name' => $request->name,
            'category_id' => $request->category_id,
            'price' => $request->price,
            'quantity' => $request->quantity,
            'photo' => $imageName
        ]);
        Alert::success('Success', 'Product Added successfully');
        return redirect(route('admin.product.index'));
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id) {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id) {
        $product = Product::find($id);
        $categories = Category::get();
        return view('Admin.product.editproduct', compact('product', 'categories'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id) {
        $product = Product::find($id);
        $file = $request->file();

        if (is_null($file)) {
            $request->validate([
                'name' => 'required',
                'price' => 'required',
                'quantity' => 'integer',
            ]);
            $product->update([
                'name' => $request->name,
                'category_id' => $request->category_id,
                'price' => $request->price,
                'quantity' => $request->quantity,
            ]);
        } else {
            $request->validate([
                'name' => 'required',
                'price' => 'required',
                'quantity' => 'integer',
                'photo' => 'required|image|max:2048',
            ]);
            $oldImage = '/productsImage//' . $product->photo;
            $imageName = time() . '_product' . '.' . $request->photo->getClientOriginalExtension();
            $this->uploadImage($request->photo, $imageName, '/productsImage//', $oldImage);
            $product->update([
                'name' => $request->name,
                'category_id' => $request->category_id,
                'price' => $request->price,
                'quantity' => $request->quantity,
                'photo' => $imageName
            ]);
        }
        Alert::success('Success', 'Product udated successfully');
        return redirect(route('admin.product.index'));
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id) {
        $product = Product::find($id);
        unlink(public_path('/uploads/productsImage/' . $product->photo));
        $product->delete();
        Alert::success('Success', 'Product deleted successfully');
        return redirect(route('admin.product.index'));
    }
}
