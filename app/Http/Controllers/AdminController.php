<?php

namespace App\Http\Controllers;

use App\Models\Book;
use App\Models\Publisher;
use Illuminate\Http\Request;

class AdminController extends Controller
{
     /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
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
        // Validate the incoming request data
        $validatedData = $request->validate([
            'book_id' => 'required',
            'title' => 'required',
            'category' => 'required',
            'publisher_id' => 'required|numeric',
            'price' => 'required|numeric',
            'stock' => 'required|integer',
        ]);

        // Create a new instance of the Book model
        $book = new Book();

        // Set the book data from the validated request data
        $book->book_id = strtoupper($validatedData['book_id']);
        $book->title = $validatedData['title'];
        $book->category = $validatedData['category'];
        $book->publisher_id = $validatedData['publisher_id'];
        $book->price = $validatedData['price'];
        $book->stock = $validatedData['stock'];

        // Save the book to the database
        $book->save();

        // Redirect to a specific route or perform any other action
        $notification = array(
            'message' => 'Book has been added successfully',
            'alert-type' => 'success'
        );
        return redirect()->back()->with($notification);
    }

    public function storePublisher(Request $request)
    {
        // Validate the incoming request data
        $validatedData = $request->validate([
            'publisher_id' => 'required',
            'name' => 'required',
            'address' => 'required',
            'city' => 'required',
            'phone_number' => 'required',
        ]);

        // Create a new instance of the Book model
        $publisher = new Publisher();

        // Set the publisher data from the validated request data
        $publisher->publisher_id = strtoupper($validatedData['publisher_id']);
        $publisher->name = $validatedData['name'];
        $publisher->address = $validatedData['address'];
        $publisher->city = $validatedData['city'];
        $publisher->phone_number = $validatedData['phone_number'];

        // Save the publisher to the database
        $publisher->save();

        // Redirect to a specific route or perform any other action
        $notification = array(
            'message' => 'Publisher has been added successfully',
            'alert-type' => 'success'
        );
        return redirect()->back()->with($notification);
    }

        /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Category  $category
     * @return \Illuminate\Http\Response
     */
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
        // Validate the incoming request data
        $validatedData = $request->validate([
            'title' => 'required',
            'book_id' => 'required',
            'category' => 'required',
            'publisher_id' => 'required',
            'price' => 'required|numeric',
            'stock' => 'required|integer',
        ]);
        
        // Find the book by ID
        $book = Book::findOrFail($id);

        // Set the book data from the validated request data
        $book->title = $validatedData['title'];
        $book->book_id = strtoupper($validatedData['book_id']);
        $book->category = $validatedData['category'];
        $book->publisher_id = $validatedData['publisher_id'];
        $book->price = $validatedData['price'];
        $book->stock = $validatedData['stock'];

        // Save the updated book to the database
        $book->save();

        // Redirect to a specific route or perform any other action
          $notification = array(
            'message' => 'Book has been updated successfully',
            'alert-type' => 'success'
        );
        return to_route('book')->with($notification);
    }

    public function updatePublisher(Request $request, $id)
    {
        // Validate the incoming request data
        $validatedData = $request->validate([
            'publisher_id' => 'required',
            'name' => 'required',
            'address' => 'required',
            'city' => 'required',
            'phone_number' => 'required',
        ]);

        // Find the publisher by ID
        $publisher = Publisher::findOrFail($id);

        // Update the publisher data from the validated request data
        $publisher->publisher_id = strtoupper($validatedData['publisher_id']);
        $publisher->name = $validatedData['name'];
        $publisher->address = $validatedData['address'];
        $publisher->city = $validatedData['city'];
        $publisher->phone_number = $validatedData['phone_number'];

        // Save the updated publisher to the database
        $publisher->save();

        // Redirect to a specific route or perform any other action
        $notification = [
            'message' => 'Publisher has been updated successfully',
            'alert-type' => 'success'
        ];
         return to_route('publisher')->with($notification);
    }



     /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Brand  $brand
     * @return \Illuminate\Http\Response
     */
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
