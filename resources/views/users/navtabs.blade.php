<ul class="nav nav-tabs nav-justified mb-3">
    {{-- ユーザ詳細タブ --}}
    <li class="nav-item">
        <a href="{{ route('users.show', ['user' => $user->id]) }}" class="nav-link {{ Request::routeIs('users.show') ? 'active' : '' }}">
            投稿内容
            <span class="badge badge-secondary">{{ $user->hot_springs_count }}</span>
        </a>
    </li>
    {{-- フォロー一覧タブ --}}
    <li class="nav-item">
        <a href="{{ route('users.followings', ['id' => $user->id]) }}" class="nav-link {{ Request::routeIs('users.followings') ? 'active' : '' }}">
            フォロー一覧
            <span class="badge badge-secondary">{{ $user->followings_count }}</span>
        </a>
    </li>
    {{-- フォロワー一覧タブ --}}
    <li class="nav-item">
        <a href="{{ route('users.followers', ['id' => $user->id]) }}" class="nav-link {{ Request::routeIs('users.followers') ? 'active' : '' }}">
            フォロワー一覧
            <span class="badge badge-secondary">{{ $user->followers_count }}</span>
        </a>
    </li>
     {{-- いい湯一覧タブ --}}
    <li class="nav-item">
        <a href="{{ route('users.add_likes', ['id' => $user->id]) }}" class="nav-link {{ Request::routeIs('users.likes') ? 'active' : '' }}">
            いい湯一覧
            <span class="badge badge-secondary">{{ $user->likes_count }}</span>
        </a>
    </li>
</ul>