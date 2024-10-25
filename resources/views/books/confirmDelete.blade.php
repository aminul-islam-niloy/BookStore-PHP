@extends('layouts.app')

@section('content')
    <h1>Confirm Delete</h1>
    <p>Are you sure you want to delete the book? "</p>
    <p> <strong>{{ $book->title }}</strong>" by {{ $book->author }}?</p>

    <form action="{{ route('books.delete', $book->id) }}" method="POST">
        @csrf
        @method('DELETE')

        <button type="submit" class="btn btn-danger">Delete</button>
        <a href="{{ route('books.index') }}" class="btn btn-secondary">Cancel</a>
    </form>
@endsection