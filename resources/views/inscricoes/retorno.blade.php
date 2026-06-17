<aside class="sidebar bg-dark text-white d-none d-lg-block">

            <div class="p-3">

                <img src="{{ asset('images/logoif.png') }}" alt="Logo" class="img-fluid w-70">
            
                <hr>

                <ul class="nav flex-column">
                        @yield('sidebar-links')
                </ul>

            </div>

        </aside>

        
        <div class="flex-grow-1">

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

            <div class="offcanvas offcanvas-start d-lg-none"
                 tabindex="-1"
                 id="sidebarMobile">

                <div class="offcanvas-header">
                    
                    <button
                        type="button"
                        class="btn-close"
                        data-bs-dismiss="offcanvas">
                    </button>

                </div>

                <div class="offcanvas-body">

                    <ul class="nav flex-column">
                        @yield('sidebar-links')
                    </ul>

                </div>

            </div>