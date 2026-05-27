<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>
</head>
<body>
    <form action="{{ route('salvar_edital') }}" method="POST">
    @csrf

    <label for="nome">Nome do edital:</label>
    <input type="text" name="nome" id="nome"><br>

    <label for="descricao">Descrição do edital:</label>
    <input type="text" name="descricao" id="descricao"><br>

    <label for="data_inicio_inscr">Data de início da inscrição:</label>
    <input type="date" name="data_inicio_inscr" id="data_inicio_inscr"><br>

    <label for="data_fim_inscr">Data do final da inscrição:</label>
    <input type="date" name="data_fim_inscr" id="data_fim_inscr"><br>

    <label for="data_inicio_rev">Data do início da revisão:</label>
    <input type="date" name="data_inicio_rev" id="data_inicio_rev"><br>

    <label for="data_fim_rev">Data do final da revisão:</label>
    <input type="date" name="data_fim_rev" id="data_fim_rev"><br>

    <input type="submit" value="Enviar">
</form>
</body>
</html>