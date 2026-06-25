<link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.3/font/bootstrap-icons.min.css">
<aside class="sidebar">

    <div class="mobile-topbar">

    <!-- Logo -->
    <div href="{{ url('/dashboard') }}" class="topbar-brand" aria-label="Início">
        <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 160 240" width="32" height="44">
            <circle cx="35" cy="35" r="22" fill="#cf2e2e"/>
            <rect x="75" y="13" width="44" height="44" rx="8" fill="#2e8b57"/>
            <rect x="131" y="13" width="44" height="44" rx="8" fill="#2e8b57"/>
            <rect x="13" y="69" width="44" height="44" rx="8" fill="#2e8b57"/>
            <rect x="75" y="69" width="44" height="44" rx="8" fill="#2e8b57"/>
            <rect x="13" y="125" width="44" height="44" rx="8" fill="#2e8b57"/>
            <rect x="75" y="125" width="44" height="44" rx="8" fill="#2e8b57"/>
            <rect x="131" y="125" width="44" height="44" rx="8" fill="#2e8b57"/>
            <rect x="13" y="181" width="44" height="44" rx="8" fill="#2e8b57"/>
            <rect x="75" y="181" width="44" height="44" rx="8" fill="#2e8b57"/>
        </svg>
        <span class="topbar-brand-text">
            <span class="brand-line-top">INSTITUTO</span>
            <span class="brand-line-bottom">FEDERAL</span>
        </span>
    </div>

    <!-- botões -->
    <nav class="topbar-icons">
        <a href="{{ url('/dashboard') }}"
           class="{{ Request::is('dashboard') ? 'active' : '' }}"
           title="Início" aria-label="Início">
            <i class="bi bi-house-fill"></i>
        </a>
         <! {{-- troque o '#' pelo link da página. Ex: href="{{ url('/perfil') }}" --}} -->
        <a href="#" title="Meu perfil" aria-label="Meu perfil">
            <i class="bi bi-person-fill"></i>
        </a>
         <! {{-- troque o '#' pelo link da página. Ex: href="{{ url('/perfil') }}" --}} -->
        <a href="{{ route('saulo') }}" title="Minhas Inscrições" aria-label="Minhas Inscrições">
            <i class="bi bi-person-vcard-fill"></i>
        </a>

        <form method="POST" action="{{ route('logout') }}" class="topbar-logout-form">
            @csrf
            <button type="submit" title="Sair" aria-label="Sair">
                <i class="bi bi-box-arrow-left"></i>
            </button>
        </form>
    </nav>
</div>

    <!-- Conteúdo da sidebar para desktop -->
    <div class="pc-sidebar-content">
    <div class="sidebar-top-elements">

        <!-- Logo -->
        <div class="sidebar-brand" >
            <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 190 240" width="56" height="auto">
                <circle cx="35" cy="35" r="22" fill="#cf2e2e"/>
                <rect x="75" y="13" width="44" height="44" rx="8" fill="#2e8b57"/>
                <rect x="131" y="13" width="44" height="44" rx="8" fill="#2e8b57"/>
                <rect x="13" y="69" width="44" height="44" rx="8" fill="#2e8b57"/>
                <rect x="75" y="69" width="44" height="44" rx="8" fill="#2e8b57"/>
                <rect x="13" y="125" width="44" height="44" rx="8" fill="#2e8b57"/>
                <rect x="75" y="125" width="44" height="44" rx="8" fill="#2e8b57"/>
                <rect x="131" y="125" width="44" height="44" rx="8" fill="#2e8b57"/>
                <rect x="13" y="181" width="44" height="44" rx="8" fill="#2e8b57"/>
                <rect x="75" y="181" width="44" height="44" rx="8" fill="#2e8b57"/>
            </svg>
            <div class="sidebar-brand-text">
                <span class="brand-top">INSTITUTO</span>
                <span class="brand-bottom">FEDERAL</span>
            </div>
        </div>

        <!-- botões -->
        <ul class="menu-links">
            <li class="{{ Request::is('/inicio') ? 'active' : '' }}">
                <a href="{{ url('/inicio') }}">
                    <i class="bi bi-house-fill me-3 fs-5"></i> Início
                </a>
            </li>
            <li>
                 <! {{-- troque o '#' pelo link da página. Ex: href="{{ url('/perfil') }}" --}} -->
                <a href="#">
                    <i class="bi bi-person-fill me-3 fs-5"></i> Meu perfil
                </a>
            </li>
            <li>
                 <! {{-- troque o '#' pelo link da página. Ex: href="{{ url('/perfil') }}" --}} -->
                <a href="{{ route('saulo') }}">
                    <i class="bi bi-person-vcard-fill me-3 fs-5"></i> Minhas Inscrições
                </a>
            </li>
        </ul>
    </div>

    <!-- Botão Sair -->
    <div class="sidebar-bottom-elements">
        <form method="POST" action="{{ route('logout') }}" class="w-100 m-0">
            @csrf
            <button type="submit" id="logout-btn">
                <i class="bi bi-box-arrow-right me-3 fs-5"></i> Sair
            </button>
        </form>
    </div>
</div>
</aside>
