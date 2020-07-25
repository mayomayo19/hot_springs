@extends('layouts.app')

@section('content')
    @if (Auth::check())
        <div class="row">
            <aside class="col-sm-4">
                {{-- ユーザ情報 --}}
                @include('users.card')
            </aside>
            <div class="col-sm-8">
                {{-- 投稿フォーム --}}
                @include('hot_springs.form')
                {{-- 投稿一覧 --}}
                @include('hot_springs.hot_springs')
            </div>
        </div>
    @else
        <div class="center jumbotron">
            <div class="text-center">
                <h1>”いい湯だな～♨”</br>にようこそ</h1>
                {{-- ユーザ登録ページへのリンク --}}
                {!! link_to_route('signup.get', '会員登録ページへ', [], ['class' => 'btn btn-lg btn-primary']) !!}
            </div>
        </div>
    @endif
@endsection