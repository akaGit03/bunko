<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class ImageController extends Controller
{
    public function showUploadForm()
    {
        return view('image-upload');
    }
    
    public function upload(Request $request) 
    {
        $request->validate([
            'image' => 'required|image|mimes:jpeg,png,jpg,gif|max:2048', // 2MBまで
        ]);

        $file_name = $request->file('image')->getClientOriginalName(); // 元のファイル名を保存
        $path = $request->file('image')->storeAs('images', $file_name, 'public'); //元のファイル名を利用してファイルを保存
        
        if ($path) {
            return redirect()->back()->with('success', '画像がアップロードされました');
        } else {
            return redirect()->back()->with('error', '画像のアップロードに失敗しました');
        }

    }
}
