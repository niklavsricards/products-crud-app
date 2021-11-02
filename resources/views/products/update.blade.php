@extends('layouts.app')

@section('content')
    <div class="flex justify-center mt-8">
        <div class="w-8/12 bg-white p-6 rounded-lg">
            Update product
        </div>
    </div>

    @if ($errors->any())
        <div class="flex justify-center mt-8">
            <div class="w-8/12 bg-white p-6 rounded-lg">
                <ul>
                    @foreach ($errors->all() as $error)
                        <li>{{ $error }}</li>
                    @endforeach
                </ul>
            </div>
        </div>
    @endif

    <div class="flex justify-center mt-8">
        <div class="w-8/12 bg-white p-6 rounded-lg">
            <form action="{{ route('update',$product->id) }}" method="post">
                @csrf
                <input class="w-1/2 h-10 px-3 mb-2 text-base text-gray-700 placeholder-gray-600 border rounded-lg
                focus:shadow-outline" value="{{ $product->product_title }}" name="title" type="text" placeholder="Product title"/>
                <input class="w-1/4 h-10 px-3 mb-2 text-base text-gray-700 placeholder-gray-600 border rounded-lg
                focus:shadow-outline" value="{{ $product->amount }}" name="units" type="number" placeholder="Product units"/>
                <input class="w-1/4 h-10 px-3 mb-2 text-base text-gray-700 placeholder-gray-600 border rounded-lg
                focus:shadow-outline" value="{{ $product->price }}" name="price" type="number" step=".01" placeholder="Product price per unit"/>
                <button class="bg-blue-500 hover:bg-blue-700 text-white font-bold py-2 px-4 rounded my-3 block"
                        type="submit">Update</button>
            </form>
        </div>
    </div>
@endsection
