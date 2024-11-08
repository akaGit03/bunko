<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Book;

class HomeController extends Controller
{
    /** ユーザーの蔵書を取得 */
    public function index()
    {
        $books = \Auth::user()->books()->orderBy('id')->get();
        return view('home.index', compact('books'));
    }

    /**　ユーザーの借出状況を取得 */
    public function borrows()
    {
        $user = \Auth::user();

        // 現在借りている本
        $currentBorrows = $user->lendings()->with('book')->whereNull('return_date')->get();

        // 借出履歴
        $borrowingHistory = $user->lendings()->with('book')->whereNotNull('return_date')->get();

        return view('home.borrowing', compact('currentBorrows', 'borrowingHistory'));
    }

    /** ユーザーの蔵書からの貸出状況を取得 */
    public function lends()
    {
        $user = \Auth::user();

        // 現在貸出中の本
        $currentLends = $user->books()->whereHas('lendings', function($query){
            $query->whereNull('return_date');
        })->with('lendings.user')->get();

        // 貸出履歴
        $lendingHistory = $user->books()->whereHas('lendings', function($query){
            $query->whereNotNull('return_date');
        })->with('lendings.user')->get();

        return view('home.lending', compact('currentLends', 'lendingHistory'));
    }

    /* 利用案内の取得 */
    public function guide() {
        return view('home.guide');
    }
}
