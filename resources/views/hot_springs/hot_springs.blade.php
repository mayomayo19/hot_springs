@if (count($hot_springs) > 0)
    <ul class="list-unstyled">
        @foreach ($hot_springs as $hot_spring)
            <li class="media mb-3">
                {{-- 投稿の所有者のメールアドレスをもとにGravatarを取得して表示 --}}
                <img class="mr-2 rounded" src="{{ Gravatar::get($hot_spring->user->email, ['size' => 50]) }}" alt="">
                <div class="media-body">
                    <div>
                        {{-- 投稿の所有者のユーザ詳細ページへのリンク --}}
                        {!! link_to_route('users.show', $hot_spring->user->name, ['user' => $hot_spring->user->id]) !!}
                        <span class="text-muted">posted at {{ $hot_spring->created_at }}</span>
                    </div>
                    <div>
                        {{-- 投稿内容 --}}
                        <p class="mb-0">{!! nl2br(e($hot_spring->content)) !!}</p>
                    </div>
                    <div>
                        @if (Auth::id() == $hot_spring->user_id)
                            {{-- 投稿削除ボタンのフォーム --}}
                            {!! Form::open(['route' => ['hot_springs.destroy', $hot_spring->id], 'method' => 'delete']) !!}
                                {!! Form::submit('削除', ['class' => 'btn btn-danger btn-sm']) !!}
                            {!! Form::close() !!}
                        @endif
                    </div>
                </div>
            </li>
        @endforeach
    </ul>
    {{-- ページネーションのリンク --}}
    {{ $hot_springs->links() }}
@endif