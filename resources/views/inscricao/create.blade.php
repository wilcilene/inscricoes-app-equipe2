<form method="POST"
      action="{{ route('inscricao.store') }}"
      enctype="multipart/form-data">

    @csrf

    <p>Ficha de inscrição</p>
    <input type="file" name="ficha_inscricao">

    <p>Identidade</p>
    <input type="file" name="identidade">

    <p>Diploma</p>
    <input type="file" name="diploma">

    <p>Currículo Lattes</p>
    <input type="file" name="curriculo_lattes">

    <p>Comprovante Eleitoral</p>
    <input type="file" name="comprovante_eleitoral">

    <p>Certificado Militar</p>
    <input type="file" name="certificado_militar">

    <button type="submit">
        Enviar
    </button>
</form>