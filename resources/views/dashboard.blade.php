@extends('layouts.app')

@section('content')

    <div class="flex justify-center mt-8">
        <div class="w-8/12 bg-white p-6 rounded-lg">
            <a href="{{ route('create.form') }}" class="bg-blue-500 hover:bg-blue-700 text-white font-bold py-2 px-4 rounded my-5">
                Create a new product
            </a>
        </div>
    </div>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 bg-white border-b border-gray-200">
                    <table>
                        <thead class="bg-gray-50">
                        <tr>
                            <th class="px-6 py-2 text-xs text-gray-500">#</th>
                            <th class="px-6 py-2 text-xs text-gray-500">Title</th>
                            <th class="px-6 py-2 text-xs text-gray-500">Units</th>
                            <th class="px-6 py-2 text-xs text-gray-500">Price per unit</th>
                            <th class="px-6 py-2 text-xs text-gray-500">Edit</th>
                            <th class="px-6 py-2 text-xs text-gray-500">Delete</th>
                            <th class="px-6 py-2 text-xs text-gray-500">View</th>
                        </tr>
                        </thead>
                        <tbody class="bg-white">
                        <?php $number = 1; ?>
                        @foreach($products as $product)
                            <tr class="whitespace-nowrap">
                                <td class="px-6 py-4 text-sm text-gray-500">{{ $number }}</td>
                                <td class="px-6 py-4">
                                    <div class="text-sm text-gray-900">{{ $product->product_title }}</div>
                                </td>
                                <td class="px-6 py-4">
                                    <div class="text-sm text-gray-500">{{ $product->amount }}</div>
                                </td>
                                <td class="px-6 py-4 text-sm text-gray-500">{{ $product->price }}</td>
                                <td class="px-6 py-4">
                                    <a href="{{ route('update.form',$product->id) }}"
                                       class="px-4 py-1 text-sm text-white bg-blue-400 rounded">Edit</a>
                                </td>
                                <td class="px-6 py-4">
                                    <form action="{{ route('delete', $product->id) }}" method="post">
                                        @csrf
                                        <button type="submit"
                                                class="px-4 py-1 text-sm text-white bg-red-400 rounded">
                                            Delete</button>
                                    </form>
                                </td>
                                <td class="px-6 py-4">
                                    <a href="{{ route('view',$product->id) }}"
                                       class="px-4 py-1 text-sm text-white bg-green-500 rounded">View</a>
                                </td>
                            </tr>
                            <?php $number++; ?>
                        @endforeach
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
@endsection
