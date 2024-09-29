<?php

namespace App\Http\Controllers;

use App\Models\Book;
use App\Models\Lending;
use Illuminate\Http\Request;

class LendingController extends Controller
{
    public function lendBook(Request $request, Book $book)
    {
        // 貸出中か確認
        if ($book->status) {
            return response()->json(['message' => 'この本は現在貸出中です。返却されるまでお待ちください。'], 400);
        }

        /* 貸出処理 */ 

        // lendingsテーブルの登録
        $lending = new Lending();
        $lending->book_id = $book->id;
        $lending->user_id = \Auth::id();
        $lending->checkout_date = now();
        $lending->save();
        
        // booksテーブルの貸出ステータスの更新
        $book->status = true;
        $book->save();

        return redirect()->back()->with('success', '本を借りました。');
    }

    public function returnBook(Request $request, Book $book)
    {
        // 貸出中のレコードを取得
        $lending = $book->lending()->whereNull('return_date')->first();

        if (!$lending) {
            return response()->json(['message' => 'この本は現在貸出されていません。'], 400);
        }

        /* 返却処理 */

        //　lendingsテーブルの更新
        $lending->return_date = now();
        $lending->updated_at = now();
        $lending->save();

        // booksテーブルの更新
        $book->status = false;
        $book->save();

        return redirect()->back()->with('success', '本を返却しました。');
    }
}
