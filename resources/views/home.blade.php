@extends('components.layout')
@php
    $msg = session('msg');
    $data = session('populate');
    if ($data != null) {
        $slug = $data->slug;
        $name = $data->name;
    }else{
        $slug = '';
        $name = '';
    }

    if ($msg != null) {
        echo $msg;
    }
@endphp
@section('content')
    <div class="my-10">
        <h1 class="text-4xl font-bold">HOME</h1>

        <div class="my-5">
            <form class="space-y-2" action="/insert_kategori" method="post">
                @csrf
                <div class="flex flex-col sm:w-4/12">
                    <label for="category_name">Category Name</label>
                    <input class="rounded-lg box-border p-3 border-2 border-orange-400" type="text" value="{{ $name }}"  name="name" required id="category_name">
                </div>

                <div class="flex flex-col sm:w-4/12">
                    <label for="slug">Slug</label>
                    <input class="rounded-lg box-border p-3 border-2 border-orange-400" type="text" value="{{ $slug }}" name="slug" required id="slug">
                </div>
                <button class="p-3 px-6 rounded-lg bg-orange-400"type="submit" name="submit">Save Insert</button>
                {{-- <button class="p-3 px-6 rounded-lg bg-orange-400"type="submit" name="submit">Save Update</button> --}}
            </form>
        </div>

        <h2 class="text-3xl">Category Name</h2>
        @foreach ($categories as $categori)
        <div class="gap-4 flex my-5 items-center">
            <li>{{ $categori->name }}=>{{ $categori->slug }}</li>
            <form action="{{ route('populate.data', ['category' => $categori->slug]) }}" method="get">
                @csrf
                <button class="p-1 px-3 rounded-lg bg-orange-400" type="submit">Update</button>
            </form>
            <form action="{{ route('delete.data', ['slug' => $categori->slug]) }}" method="POST">
                @csrf
                <button class="p-1 px-3 rounded-lg bg-orange-400" type="submit" _method="DELETE">Delete</button>
            </form>
        </div>
        @endforeach
    </div>

@endsection