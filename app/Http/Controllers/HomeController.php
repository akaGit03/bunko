<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Book;

class HomeController extends Controller
{
    public function index()
    {
        $books = \Auth::user()->books()->orderBy('id')->get();
        $data = ['books' => $books,];
        return view('home.lending', $data);
    }
}
