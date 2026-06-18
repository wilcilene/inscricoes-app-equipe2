<!DOCTYPE html>
<html lang="pt-BR">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>@yield('title', 'Sistema')</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.8/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-sRIl4kxILFvY47J16cr9ZwB07vP4J8+LH7qKQnuqkuIAvNWLzeN8tE5YBujZqJLB" crossorigin="anonymous">

    
</head>
<body>

    <div class="d-flex">

        <!-- Sidebar Desktop -->
      @vite(['resources/css/sidebar.css'])
      @include('layouts.sidebar')

            <!-- Conteúdo das páginas -->
            <main class="container-fluid p-4 bg-light">

                @yield('conteudo')

            </main>

        </div>

    </div>

</body>
</html>