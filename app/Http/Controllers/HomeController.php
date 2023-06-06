<?php

namespace App\Http\Controllers;

use App\Models\Book;
use Illuminate\Http\Request;

class HomeController extends Controller
{

    public function index()
    {
        $data['books'] = Book::latest()->get();
        return view('pages.index', $data);
    }
}
