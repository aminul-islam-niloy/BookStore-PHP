@extends('layouts.app')

@section('content')
    <h3>Book List</h1>
    <a href="{{ route('books.create') }}" class="btn btn-primary">Add New Book</a>

    @if (session('success'))
        <div class="alert alert-success">
            {{ session('success') }}
        </div>
    @endif

    <table class="table table-bordered mt-3">
        <thead>
            <tr>
                <th>Id</th>
                <th>Title</th>
                <th>Author</th>
                <th>ISBN</th>
                <th>Stock</th>
                <th>Price</th>
                <th>Action</th>
            </tr>
        </thead>
        <tbody>
            @foreach ($books as $book)
                <tr>
                    <td>{{ $book->id }}</td>
                    <td>{{ $book->title }}</td>
                    <td>{{ $book->author }}</td>
                    <td>{{ $book->isbn }}</td>
                    <td>{{ $book->stock }}</td>
                    <td>{{ $book->price }}</td>
                    <td> <a href="{{ route('books.edit', $book->id) }}" >Edit</a>
                    <a href="{{ route('books.confirmDelete', $book->id) }}" >Delete</a>

                    </td>
                </tr>
            @endforeach
        </tbody>
    </table>

 
<div class="d-flex justify-content-center">
        {{ $books->links() }}
</div>   
@endsection
