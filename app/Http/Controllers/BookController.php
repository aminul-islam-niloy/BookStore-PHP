<?php

namespace App\Http\Controllers;
use App\Models\Book;

use Illuminate\Http\Request;

class BookController extends Controller
{
    // public function index()
    // {
    //     $books = Book::paginate(10); 
    //     return view('books.index', compact('books'));
      
    // }

    public function index()
    {
        $books = Book::orderBy('author', 'desc')->paginate(10);

       // $books = Book::paginate(10); 
        return view('books.index', compact('books'));
      
    }




    public function create()
    {
        return view('books.create');
    }

    public function store(Request $request)
    {
        $request->validate([
            'title' => 'required|string|max:255',
            'author' => 'required|string|max:255',
            'isbn' => 'required|string|max:13',
            'stock' => 'required|integer|min:0|max:99999',
            'price' => 'required|numeric|min:0|max:99999.99',
        ]);

        Book::create($request->all());
        return redirect()->route('books.index');

    }

    public function edit($id)
        {
          $books = Book::findOrFail($id);
         return view('books.edit', compact('books'));
       }

    public function update(Request $request, $id)
    {
        $book = Book::findOrFail($id);
        $request->validate([
           'title' => 'required|string|max:255',
            'author' => 'required|string|max:255',
            'isbn' => 'required|string|max:13',
            'stock' => 'required|integer|min:0|max:99999',
            'price' => 'required|numeric|min:0|max:99999.99',
        ]);

        $book->update($request->all());
        return redirect()->route('books.index');
    }


    
public function confirmDelete($id)
{
    $book = Book::findOrFail($id);
    return view('books.confirmDelete', compact('book'));
}

public function delete($id)
{
    $book = Book::findOrFail($id);
    $book->delete();
    return redirect()->route('books.index')->with('success', 'Book deleted successfully.');
}

}
