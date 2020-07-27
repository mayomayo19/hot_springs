<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class Hot_springsController extends Controller
{
   public function index()
    {
        $data = [];
        if (\Auth::check()) { // 認証済みの場合
            // 認証済みユーザを取得
            $user = \Auth::user();
            // ユーザの投稿の一覧を作成日時の降順で取得
            $hot_springs = $user->feed_hot_springs()->orderBy('created_at', 'desc')->paginate(10);

            $data = [
                'user' => $user,
                'hot_springs' => $hot_springs,
            ];
        }

        // Welcomeビューでそれらを表示
        return view('welcome', $data);
    }
    
    public function store(Request $request)
    {
        // バリデーション
        $request->validate([
            'content' => 'required|max:255',
        ]);

        // 認証済みユーザ（閲覧者）の投稿として作成（リクエストされた値をもとに作成）
        $request->user()->hot_springs()->create([
            'content' => $request->content,
        ]);

        // 前のURLへリダイレクトさせる
        return back();
    }
    
    public function destroy($id)
    {
        // idの値で投稿を検索して取得
        $hot_spring = \App\Hot_spring::findOrFail($id);

        // 認証済みユーザ（閲覧者）がその投稿の所有者である場合は、投稿を削除
        if (\Auth::id() === $hot_spring->user_id) {
            $hot_spring->delete();
        }

        // 前のURLへリダイレクトさせる
        return back();
    }
}
