<!DOCTYPE html>
<html lang="pt-BR">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Sistema</title>

    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">

    <style>
        body{
            background: url('https://especiais.gazetadopovo.com.br/wp-content/uploads/sites/22/2020/01/29060758/gazeta-do-povo-blog-concurseiros-ifc-sc-campus-sao-bento-do-sul-divulgacao-ifc-sc-1024x579.jpg')
            no-repeat center center fixed;
            background-size: cover;
        }
    </style>
</head>
<body>

    <div class="container-fluid min-vh-100 d-flex justify-content-center align-items-center">

        <div class="card shadow rounded-4 p-4" style="width: 420px;">

            <h1 class="text-center mb-4 fs-3">
                Acesso ao Sistema
            </h1>

            @yield('form')

        </div>

    </div>

</body>
</html>