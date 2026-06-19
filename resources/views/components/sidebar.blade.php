  <aside class="sidebar bg-dark text-white d-none d-lg-block">

            <div class="p-3">

                <h4>Sistema</h4>

                <hr>

                <ul class="nav flex-column">
                    @yield('sidebar-links')
                    <li class="nav-item">
                    
                    </li>

                </ul>

            </div>

        </aside>

        <!-- Conteúdo principal -->
        <div class="flex-grow-1">

            <!-- Navbar Mobile -->
            <nav class="navbar navbar-light bg-light d-lg-none">
                <div class="container-fluid">

                    <button
                        class="btn btn-outline-secondary"
                        type="button"
                        data-bs-toggle="offcanvas"
                        data-bs-target="#sidebarMobile">

                        ☰

                    </button>

                    <span class="navbar-brand mb-0">
                        Sistema
                    </span>

                </div>
            </nav>

            <!-- Sidebar Mobile -->
            <div class="offcanvas offcanvas-start d-lg-none"
                 tabindex="-1"
                 id="sidebarMobile">

                <div class="offcanvas-header">

                    <h5 class="offcanvas-title">
                        Sistema
                    </h5>

                    <button
                        type="button"
                        class="btn-close"
                        data-bs-dismiss="offcanvas">
                    </button>

                </div>

                <div class="offcanvas-body">

                    <ul class="nav flex-column">

                        <li class="nav-item">
                            <a href="{{ route('dashboard') }}"
                               class="nav-link">
                                Dashboard
                            </a>
                        </li>
                    </ul>

                </div>

            </div>