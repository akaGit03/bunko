<?php

namespace App\Http\Controllers;

use App\Models\Book;
use App\Models\Type;
use App\Models\User;
use Illuminate\Http\Request;

class BookController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $books = Book::paginate(20);
        $data = ['books' => $books];
        return view('books.index', $data);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $book = new Book();
        $data = ['data' => $book];
        return view('books.create', $data);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $request->validate([
            'title' => 'required|max:255',
            'author' => 'required|max:255',
            'type_id' => 'required',
            'comment' => 'max:255'
        ]);

        $book = new Book();
        $book->title = $request->title;
        $book->author = $request->author;
        $book->type_id = $request->type_id;
        $book->comment = $request->comment;
        $book->save();

        return redirect(route('books.index'));
    }

    /**
     * Display the specified resource.
     */
    public function show(Book $book)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Book $book)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Book $book)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Book $book)
    {
        //
    }

    /* 検索機能 */
    public function search(Request $request)
    {
        $query = Book::query();

        if ($request->filled('keyword')) {
            $query->where(function($q) use ($request) {
                $q->where('title', 'like', "%{$request->keyword}%")
                ->orWhere('author', 'like', "%{$request->keyword}%");
            });
        }
        
        if ($request->filled('user_id')) {
            $query->where('user_id', $request->user_id);
        }

        if ($request->filled('type_id')) {
            $query->where('type_id', $request->type_id);
        }

        if ($request->filled('sort')) {
            if ($request->sort == 'created_desc') {
                $query->orderBy('created_at', 'desc');
            } elseif ($request->sort == 'price_asc') {
                $query->orderBy('price', 'asc');
            } elseif ($request->sort == 'price_desc') {
                $query->orderBy('price', 'desc');
            }
        } else {
            $query->orderBy('created_at', 'asc');
        }

        // 統計情報を計算
        $count = $query->count();
        
        $books = $query->paginate(20);

        return view('books.index', compact('books', 'count'));
    }
}
