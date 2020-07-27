
@if (Auth::user()->is_like($hot_spring->id))
    {{-- お気に入り解除ボタンのフォーム --}}
    {!! Form::open(['route' => ['likes.unlike', $hot_spring->id], 'method' => 'delete']) !!}
        {!! Form::submit('NOTいい湯', ['class' => "btn btn-danger btn-sm"]) !!}
    {!! Form::close() !!}
@else
    {{-- お気に入りボタンのフォーム --}}
    {!! Form::open(['route' => ['likes.like', $hot_spring->id]]) !!}
        {!! Form::submit('いい湯', ['class' => "btn btn-primary btn-sm"]) !!}
    {!! Form::close() !!}
@endif

