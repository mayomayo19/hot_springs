<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class LikesController extends Controller
{
   /**
     * 投稿をお気に入り登録するアクション。
     *
     * @param  $id  投稿のid
     * @return \Illuminate\Http\Response
     */
    public function store($id)
    {
        // 認証済みユーザ（閲覧者）が、 idの投稿をお気に入り登録する
        \Auth::user()->like($id);
        // 前のURLへリダイレクトさせる
        return back();
    }
    
    /**
     * 投稿のお気に入り登録を外すアクション
     *
     * @param  $id  投稿のid
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        // 認証済みユーザ（閲覧者）が、 idの投稿のお気に入り登録を外す
        \Auth::user()->unlike($id);
        // 前のURLへリダイレクトさせる
        return back();
    }
}
