@extends('layouts.app')
@section('conteudo')
<div class="container py-5" style="max-width: 980px;">
    <h1 class="fw-bold fs-2 mb-0" style="letter-spacing: -0.5px;">Inscrição</h1>
  <p class="text-secondary mb-4" style="font-size: 0.95rem;">Certifique-se de que os dados estão corretos</p>





</div>






<form method="POST"
      action="{{ route('inscricao.store') }}"
      enctype="multipart/form-data">

    @csrf
    <input type="hidden" name="candidato_id" value="1">
    <input type="hidden" name="edital_id" value="1">

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

@endsection