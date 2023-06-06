<?php

namespace App\Http\Controllers;

use App\Models\Book;
use App\Models\Publisher;
use Illuminate\Http\Request;

class AdminController extends Controller
{

    public function index()
    {
        $data['books'] = Book::latest()->get();
        $data['publishers'] = Publisher::latest()->get();
        return view('pages.book', $data);
    }

    public function publisher()
    {
        $data['publishers'] = Publisher::latest()->get();
        return view('pages.publisher', $data);
    }

   public function store(Request $request)
    {
        
        $validatedData = $request->validate([
            'book_id' => 'required',
            'title' => 'required',
            'category' => 'required',
            'publisher_id' => 'required|numeric',
            'price' => 'required|numeric',
            'stock' => 'required|integer',
        ]);

        
        $book = new Book();
        
        $book->book_id = strtoupper($validatedData['book_id']);
        $book->title = $validatedData['title'];
        $book->category = $validatedData['category'];
        $book->publisher_id = $validatedData['publisher_id'];
        $book->price = $validatedData['price'];
        $book->stock = $validatedData['stock'];

        $book->save();

        
        $notification = array(
            'message' => 'Book has been added successfully',
            'alert-type' => 'success'
        );
        return redirect()->back()->with($notification);
    }

    public function storePublisher(Request $request)
    {
        $validatedData = $request->validate([
            'publisher_id' => 'required',
            'name' => 'required',
            'address' => 'required',
            'city' => 'required',
            'phone_number' => 'required',
        ]);

        $publisher = new Publisher();

        $publisher->publisher_id = strtoupper($validatedData['publisher_id']);
        $publisher->name = $validatedData['name'];
        $publisher->address = $validatedData['address'];
        $publisher->city = $validatedData['city'];
        $publisher->phone_number = $validatedData['phone_number'];

        $publisher->save();

        $notification = array(
            'message' => 'Publisher has been added successfully',
            'alert-type' => 'success'
        );
        return redirect()->back()->with($notification);
    }

    public function edit(Book $book)
    {
        $data['book'] = $book;
        $data['publishers'] = Publisher::orderBy('name', 'ASC')->get();
        return view('pages.book_edit', $data);
    }

    public function editPublisher(Publisher $publisher)
    {
        $data['publisher'] = $publisher;
        return view('pages.publisher_edit', $data);
    }

    public function update(Request $request, $id)
    {
        $validatedData = $request->validate([
            'title' => 'required',
            'book_id' => 'required',
            'category' => 'required',
            'publisher_id' => 'required',
            'price' => 'required|numeric',
            'stock' => 'required|integer',
        ]);
        
        $book = Book::findOrFail($id);

        $book->title = $validatedData['title'];
        $book->book_id = strtoupper($validatedData['book_id']);
        $book->category = $validatedData['category'];
        $book->publisher_id = $validatedData['publisher_id'];
        $book->price = $validatedData['price'];
        $book->stock = $validatedData['stock'];

        $book->save();

          $notification = array(
            'message' => 'Book has been updated successfully',
            'alert-type' => 'success'
        );
        return to_route('book')->with($notification);
    }

    public function updatePublisher(Request $request, $id)
    {
        $validatedData = $request->validate([
            'publisher_id' => 'required',
            'name' => 'required',
            'address' => 'required',
            'city' => 'required',
            'phone_number' => 'required',
        ]);

        $publisher = Publisher::findOrFail($id);

        $publisher->publisher_id = strtoupper($validatedData['publisher_id']);
        $publisher->name = $validatedData['name'];
        $publisher->address = $validatedData['address'];
        $publisher->city = $validatedData['city'];
        $publisher->phone_number = $validatedData['phone_number'];

        $publisher->save();

        $notification = [
            'message' => 'Publisher has been updated successfully',
            'alert-type' => 'success'
        ];
         return to_route('publisher')->with($notification);
    }

    public function destroy(Book $book)
    {
        Book::destroy($book->id);
        $notification = array(
            'message' => 'A book has been deleted',
            'alert-type' => 'success'
        );
        return to_route('book')->with($notification);
    }

    public function destroyPublisher(Publisher $publisher)
    {
        Publisher::destroy($publisher->id);
        Book::where('publisher_id', $publisher->id)->delete();
        $notification = array(
            'message' => 'A publisher has been deleted',
            'alert-type' => 'success'
        );
        return to_route('publisher')->with($notification);
    }
}
