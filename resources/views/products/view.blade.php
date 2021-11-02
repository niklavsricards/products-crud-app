@extends('layouts.app')

@section('content')
    <div class="flex justify-center mt-8">
        <div class="w-8/12 bg-white p-6 rounded-lg">
            <a href="{{ route('dashboard') }}"
               class="bg-green-500 hover:bg-blue-700 text-white font-bold py-2 px-4 rounded my-5">
                Go back to product list
            </a>
        </div>
    </div>

    <div class="flex justify-center mt-8">
        <div class="w-8/12 bg-white p-6 rounded-lg">
            <ul>
                <li><b>Product title:</b> {{ $product->product_title }}</li>
                <li><b>Units:</b> {{ $product->amount }}</li>
                <li><b>Price:</b> {{ $product->price }}</li>
            </ul>
        </div>
    </div>
@endsection
