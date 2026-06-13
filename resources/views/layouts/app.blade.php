<!DOCTYPE html>
<html lang="pt-BR">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>@yield('title', 'Sistema')</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.8/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-sRIl4kxILFvY47J16cr9ZwB07vP4J8+LH7qKQnuqkuIAvNWLzeN8tE5YBujZqJLB" crossorigin="anonymous">

    <style>
        .sidebar {
            width: 250px;
            min-height: 100vh;
        }
    </style>

    @yield('style')
</head>
<body>

    <div class="d-flex">

        <!-- Sidebar Desktop -->
      @include('components.sidebar')

            <!-- Conteúdo das páginas -->
            <main>

                @yield('conteudo')

            </main>

        </div>

    </div>
 @yield("script")
</body>
</html>
