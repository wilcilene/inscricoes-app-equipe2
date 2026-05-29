@extends('cadastro.layout')

@section('content')

<div class="stepper-row">
    <div class="stepper">
        <div class="step-dot done"></div>
        <div class="step-line done"></div>
        <div class="step-dot active"></div>
        <div class="step-line"></div>
        <div class="step-dot"></div>
    </div>
    <button form="form-etapa2" type="submit" class="btn-proximo">Próximo</button>
</div>

@if ($errors->any())
    <div class="alert alert-danger">
        <ul style="list-style:none; padding:0; margin:0;">
            @foreach ($errors->all() as $error)
                <li>• {{ $error }}</li>
            @endforeach
        </ul>
    </div>
@endif

<div class="card">
    <h2>Endereço e Contato</h2>

    <form id="form-etapa2" action="{{ route('cadastro.salvarEtapa2') }}" method="POST">
        @csrf

        {{-- CEP | Logradouro --}}
        <div class="form-grid col-2" style="margin-bottom:18px;">
            <div class="field" style="max-width:200px;">
                <label>CEP*:</label>
                <input type="text" name="cep" id="cep"
                    value="{{ old('cep', $dados['cep'] ?? '') }}"
                    placeholder="00000-000"
                    maxlength="9"
                    class="{{ $errors->has('cep') ? 'is-invalid' : '' }}"
                    oninput="mascaraCEP(this)"
                    onblur="buscarCEP(this.value)">
                @error('cep') <span class="error-msg">{{ $message }}</span> @enderror
            </div>

            <div class="field">
                <label>Logradouro*:</label>
                <input type="text" name="logradouro" id="logradouro"
                    value="{{ old('logradouro', $dados['logradouro'] ?? '') }}"
                    placeholder="Preencher..."
                    class="{{ $errors->has('logradouro') ? 'is-invalid' : '' }}">
                @error('logradouro') <span class="error-msg">{{ $message }}</span> @enderror
            </div>
        </div>

        {{-- Número | Complemento | Bairro --}}
        <div class="form-grid col-3" style="margin-bottom:18px;">
            <div class="field" style="max-width:140px;">
                <label>Número*:</label>
                <input type="text" name="numero"
                    value="{{ old('numero', $dados['numero'] ?? '') }}"
                    placeholder="00000"
                    maxlength="10"
                    class="{{ $errors->has('numero') ? 'is-invalid' : '' }}">
                @error('numero') <span class="error-msg">{{ $message }}</span> @enderror
            </div>

            <div class="field">
                <label>Complemento:</label>
                <input type="text" name="complemento"
                    value="{{ old('complemento', $dados['complemento'] ?? '') }}"
                    placeholder="Preencher...">
            </div>

            <div class="field">
                <label>Bairro*:</label>
                <input type="text" name="bairro" id="bairro"
                    value="{{ old('bairro', $dados['bairro'] ?? '') }}"
                    placeholder="Preencher..."
                    class="{{ $errors->has('bairro') ? 'is-invalid' : '' }}">
                @error('bairro') <span class="error-msg">{{ $message }}</span> @enderror
            </div>
        </div>

        {{-- Estado | Cidade --}}
        <div class="form-grid col-2" style="margin-bottom:18px;">
            <div class="field">
                <label>Estado*:</label>
                <input type="text" name="estado" id="estado"
                    value="{{ old('estado', $dados['estado'] ?? '') }}"
                    placeholder="Ex: SC"
                    maxlength="2"
                    class="{{ $errors->has('estado') ? 'is-invalid' : '' }}">
                @error('estado') <span class="error-msg">{{ $message }}</span> @enderror
            </div>

            <div class="field">
                <label>Cidade*:</label>
                <input type="text" name="cidade" id="cidade"
                    value="{{ old('cidade', $dados['cidade'] ?? '') }}"
                    placeholder="Preencher..."
                    class="{{ $errors->has('cidade') ? 'is-invalid' : '' }}">
                @error('cidade') <span class="error-msg">{{ $message }}</span> @enderror
            </div>
        </div>

        {{-- Telefone | Celular --}}
        <div class="form-grid col-2">
            <div class="field" style="max-width:220px;">
                <label>Telefone:</label>
                <input type="text" name="telefone"
                    value="{{ old('telefone', $dados['telefone'] ?? '') }}"
                    placeholder="00 0000-0000"
                    maxlength="15"
                    oninput="mascaraTelefone(this)">
            </div>

            <div class="field" style="max-width:220px;">
                <label>Celular*:</label>
                <input type="text" name="celular"
                    value="{{ old('celular', $dados['celular'] ?? '') }}"
                    placeholder="00 00000-0000"
                    maxlength="16"
                    class="{{ $errors->has('celular') ? 'is-invalid' : '' }}"
                    oninput="mascaraCelular(this)">
                @error('celular') <span class="error-msg">{{ $message }}</span> @enderror
            </div>
        </div>

    </form>

    <div class="card-footer">
        <a href="{{ route('cadastro.cancelar') }}" class="btn-cancelar">Cancelar</a>
    </div>
</div>

<script>
function mascaraCEP(input) {
    let v = input.value.replace(/\D/g, '').substring(0, 8);
    if (v.length > 5) {
        v = v.substring(0, 5) + '-' + v.substring(5);
    }
    input.value = v;
}

function mascaraTelefone(input) {
    let v = input.value.replace(/\D/g, '').substring(0, 10);
    v = v.replace(/(\d{2})(\d)/, '$1 $2');
    v = v.replace(/(\d{4})(\d{1,4})$/, '$1-$2');
    input.value = v;
}

function mascaraCelular(input) {
    let v = input.value.replace(/\D/g, '').substring(0, 11);
    v = v.replace(/(\d{2})(\d)/, '$1 $2');
    v = v.replace(/(\d{5})(\d{1,4})$/, '$1-$2');
    input.value = v;
}

async function buscarCEP(cep) {
    const numeros = cep.replace(/\D/g, '');
    if (numeros.length !== 8) return;

    try {
        const res = await fetch(`https://viacep.com.br/ws/${numeros}/json/`);
        const data = await res.json();
        if (!data.erro) {
            document.getElementById('logradouro').value = data.logradouro || '';
            document.getElementById('bairro').value     = data.bairro     || '';
            document.getElementById('cidade').value     = data.localidade  || '';
            document.getElementById('estado').value     = data.uf         || '';
        }
    } catch (e) {
        // CEP não encontrado, usuário preenche manualmente
    }
}
</script>

@endsection
