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
        $books = Book::paginate(30);
        return view('books.index', compact('books'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $book = new Book();
        return view('books.create', compact('book'));
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
        $book->user_id = \Auth::id();
        $book->comment = $request->comment;
        $book->save();

        return redirect()->back()->with('success', '登録されました');
    }

    /**
     * Display the specified resource.
     */
    public function show(Book $book)
    {
        return view( 'books.show', compact('book'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Book $book)
    {
        $this->authorize($book);
        return view( 'books.edit', compact('book'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Book $book)
    {
        $this->authorize($book);
        $request->validate([
            'title' => 'required|max:255',
            'author' => 'required|max:255',
            'type_id' => 'required',
            'comment' => 'max:255'
        ]);

        $book->title = $request->title;
        $book->author = $request->author;
        $book->type_id = $request->type_id;
        $book->comment = $request->comment;
        $book->save();

        return redirect(route('books.show', $book))->with('success', '図書情報が更新されました');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Book $book)
    {
        $this->authorize($book);
        $book->delete();
        return redirect()->back()->with('success', '削除されました');
    }

    /** 検索機能 */
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

        if ($request->filled('status')) {
            $query->where('status', $request->status);
        }

        // 検索ヒット数
        $count = $query->count();
        
        $books = $query->paginate(30);

        return view('books.index', compact('books', 'count'));
    }
}
