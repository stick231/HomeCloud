<!DOCTYPE html>
<html lang="en">
<head>
    <meta name="csrf-token" content="{{ csrf_token() }}">
    @stack('head')
</head>
<body>
    <header>
        <div class="logo-div"><img class="logo" src="{{ asset('img/logo.png') }}" alt="Логотип"></div>
        <div class="search-bar">
            {{-- <form action="{{ route('my-cloud.search') }}" method="get">
                <input type="text" name="search" placeholder="Search file or user"> 
            </form> --}}
        </div>
    </header>

    <div class="container">
        <aside>        
            <a href="{{ route('user.index', $user) }}"><div class="menu account-btn">My account</div></a>
            <a href="{{ route('my-family.index') }}"><div class="menu family-btn">Family</div></a>
            <a href="{{ route('my-cloud.index') }}"><div class="menu user-files-btn">My files</div></a>
            <a href="{{ route('my-family-cloud.index') }}"><div class="menu family-files-btn">Family files</div></a>{{-- добавить имя семьи или если нету убрать кнопку  --}}
            {{-- <a href="{{ route('settings.index') }}"><div class="menu setting-btn">Settings</div></a>
            <a href="{{ route('trash.index') }}"><div class="menu trash-btn">Trash</div></a> --}}
        </aside>

        <main>
            @yield('content')
        </main>
    </div>

    {{-- <footer>
        Footer
    </footer> --}}
</body>
</html>


