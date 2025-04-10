<!DOCTYPE html>
<html lang="en">
<head>
    @stack('head')
</head>
<body>
    <header>
        <div class="logo-div"><img class="logo" src="{{ asset('img/logo.png') }}" alt="Логотип"></div>
        <div class="search-bar">
            <input type="text" placeholder="Search file or user">
        </div>
    </header>

    <div class="container">
        <aside>        
            <a href="{{ route('user.index') }}"><div class="menu account-btn">My account</div></a>
            <a href="{{ route('family.index') }}"><div class="menu family-btn">Family</div></a>
            <a href="{{ route('index') }}"><div class="menu user-files-btn">My files</div></a>
            <a href=""><div class="menu family-files-btn">Family files</div></a>{{-- добавить имя семьи или если нету убрать кнопку  --}}
            <a href="{{ route('settings.index') }}"><div class="menu setting-btn">Settings</div></a>
            <a href="{{ route('trash.index') }}"><div class="menu trash-btn">Trash</div></a>
        </aside>

        <main>
            @yield('content')
        </main>
    </div>

    <footer>
        Footer
    </footer>
</body>
</html>

