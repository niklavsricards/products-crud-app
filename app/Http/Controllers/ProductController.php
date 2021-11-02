<?php

namespace App\Http\Controllers;

use App\Models\Product;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use Spatie\Activitylog\Models\Activity;

class ProductController extends Controller
{
    public function index()
    {
        $products = DB::table('product')->get();

        activity()
            ->causedBy(Auth::id())
            ->log('Viewed all products');

        return view('dashboard', ['products' => $products]);
    }

    public function createForm()
    {
        activity()
            ->causedBy(Auth::id())
            ->log('Went to create product form');

        return view('products.create');
    }

    public function create(Request $request)
    {
        $request->validate([
            'title' => ['required', 'max:255'],
            'units' => ['required', 'numeric','min:0', 'not_in:0'],
            'price' => ['required', 'numeric', 'min:0', 'not_in:0']
        ]);

        Product::create([
            'product_title' => $request->title,
            'amount' => $request->units,
            'price' => $request->price
        ]);

        activity()
            ->causedBy(Auth::id())
            ->log('Created a new product');

        return redirect()->route('dashboard');
    }

    public function updateForm(string $id)
    {
        $product = Product::where(['id' => $id])
            ->first();

        activity()
            ->causedBy(Auth::id())
            ->performedOn($product)
            ->log('Went to update product form');

        return view('products.update', ['product' => $product]);
    }

    public function update(Request $request, string $id)
    {
        $request->validate([
            'title' => ['required', 'max:255'],
            'units' => ['required', 'numeric','min:0', 'not_in:0'],
            'price' => ['required', 'numeric', 'min:0', 'not_in:0']
        ]);

        $product = Product::where(['id' => $id])
            ->first();

        $product->update([
            'product_title' => $request->title,
            'amount' => $request->units,
            'price' => $request->price
        ]);

        activity()
            ->causedBy(Auth::id())
            ->performedOn($product)
            ->log('Updated product');

        return redirect()->route('dashboard');
    }

    public function delete(string $id)
    {
        $product = Product::where(['id' => $id])
            ->first();

        $product->delete();

        activity()
            ->causedBy(Auth::id())
            ->performedOn($product)
            ->log('Deleted product');

        return redirect()->route('dashboard');
    }

    public function view(string $id)
    {
        $product = Product::where(['id' => $id])
            ->first();

        activity()
            ->causedBy(Auth::id())
            ->performedOn($product)
            ->log('Viewed product');

        return view('products.view', ['product' => $product]);
    }
}
