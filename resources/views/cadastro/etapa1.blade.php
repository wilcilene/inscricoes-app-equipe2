@extends('cadastro.layout')

@section('content')

<div class="stepper-row">
    <div class="stepper">
        <div class="step-dot active"></div>
        <div class="step-line"></div>
        <div class="step-dot"></div>
        <div class="step-line"></div>
        <div class="step-dot"></div>
    </div>
    <button form="form-etapa1" type="submit" class="btn-proximo">Próximo</button>
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
    <h2>Dados Pessoais</h2>

    <form id="form-etapa1" action="{{ route('cadastro.salvarEtapa1') }}" method="POST">
        @csrf

        {{-- Nome Completo --}}
        <div class="form-grid col-1" style="margin-bottom:18px;">
            <div class="field">
                <label>Nome Completo*:</label>
                <input type="text" name="nome_completo"
                    value="{{ old('nome_completo', $dados['nome_completo'] ?? '') }}"
                    placeholder="Preencher..."
                    class="{{ $errors->has('nome_completo') ? 'is-invalid' : '' }}">
                @error('nome_completo') <span class="error-msg">{{ $message }}</span> @enderror
            </div>
        </div>

        {{-- Nome Social --}}
        <div class="form-grid col-1" style="margin-bottom:18px;">
            <div class="field">
                <label>Nome Social (se houver):</label>
                <input type="text" name="nome_social"
                    value="{{ old('nome_social', $dados['nome_social'] ?? '') }}"
                    placeholder="Preencher...">
            </div>
        </div>

        {{-- CPF | Nascimento | Gênero | Naturalidade --}}
        <div class="form-grid col-4" style="margin-bottom:18px;">
            <div class="field">
                <label>CPF*:</label>
                <input type="text" name="cpf"
                    value="{{ old('cpf', $dados['cpf'] ?? '') }}"
                    placeholder="000.000.000-00"
                    maxlength="14"
                    class="{{ $errors->has('cpf') ? 'is-invalid' : '' }}"
                    oninput="mascaraCPF(this)">
                @error('cpf') <span class="error-msg">{{ $message }}</span> @enderror
            </div>

            <div class="field">
                <label>Data de Nascimento*:</label>
                <input type="date" name="data_nascimento"
                    value="{{ old('data_nascimento', $dados['data_nascimento'] ?? '') }}"
                    class="{{ $errors->has('data_nascimento') ? 'is-invalid' : '' }}">
                @error('data_nascimento') <span class="error-msg">{{ $message }}</span> @enderror
            </div>

            <div class="field">
                <label>Gênero*:</label>
                <select name="genero" class="{{ $errors->has('genero') ? 'is-invalid' : '' }}">
                    <option value="">Selecione</option>
                    <option value="masculino"            {{ old('genero', $dados['genero'] ?? '') == 'masculino'            ? 'selected' : '' }}>Masculino</option>
                    <option value="feminino"             {{ old('genero', $dados['genero'] ?? '') == 'feminino'             ? 'selected' : '' }}>Feminino</option>
                    <option value="outro"                {{ old('genero', $dados['genero'] ?? '') == 'outro'                ? 'selected' : '' }}>Outro</option>
                    <option value="prefiro_nao_informar" {{ old('genero', $dados['genero'] ?? '') == 'prefiro_nao_informar' ? 'selected' : '' }}>Prefiro não informar</option>
                </select>
                @error('genero') <span class="error-msg">{{ $message }}</span> @enderror
            </div>

            <div class="field">
                <label>Naturalidade*:</label>
                <select name="naturalidade" class="{{ $errors->has('naturalidade') ? 'is-invalid' : '' }}">
                    <option value="">Selecione</option>
                    @foreach(['Acre','Alagoas','Amapá','Amazonas','Bahia','Ceará','Distrito Federal','Espírito Santo','Goiás','Maranhão','Mato Grosso','Mato Grosso do Sul','Minas Gerais','Pará','Paraíba','Paraná','Pernambuco','Piauí','Rio de Janeiro','Rio Grande do Norte','Rio Grande do Sul','Rondônia','Roraima','Santa Catarina','São Paulo','Sergipe','Tocantins'] as $estado)
                        <option value="{{ $estado }}" {{ old('naturalidade', $dados['naturalidade'] ?? '') == $estado ? 'selected' : '' }}>
                            {{ $estado }}
                        </option>
                    @endforeach
                </select>
                @error('naturalidade') <span class="error-msg">{{ $message }}</span> @enderror
            </div>
        </div>

        {{-- Mãe | Pai --}}
        <div class="form-grid col-2" style="margin-bottom:18px;">
            <div class="field">
                <label>Mãe*:</label>
                <input type="text" name="nome_mae"
                    value="{{ old('nome_mae', $dados['nome_mae'] ?? '') }}"
                    placeholder="Preencher..."
                    class="{{ $errors->has('nome_mae') ? 'is-invalid' : '' }}">
                @error('nome_mae') <span class="error-msg">{{ $message }}</span> @enderror
            </div>

            <div class="field">
                <label>Pai:</label>
                <input type="text" name="nome_pai"
                    value="{{ old('nome_pai', $dados['nome_pai'] ?? '') }}"
                    placeholder="Preencher...">
            </div>
        </div>

        {{-- Área Profissional --}}
        <div class="form-grid col-1">
            <div class="field">
                <label>Área Profissional de Atuação do Candidato*:</label>
                <input type="text" name="area_profissional"
                    value="{{ old('area_profissional', $dados['area_profissional'] ?? '') }}"
                    placeholder="Preencher..."
                    class="{{ $errors->has('area_profissional') ? 'is-invalid' : '' }}">
                @error('area_profissional') <span class="error-msg">{{ $message }}</span> @enderror
            </div>
        </div>

    </form>

    <div class="card-footer">
        <a href="{{ route('cadastro.cancelar') }}" class="btn-cancelar">Cancelar</a>
    </div>
</div>

<script>
function mascaraCPF(input) {
    let v = input.value.replace(/\D/g, '').substring(0, 11);
    v = v.replace(/(\d{3})(\d)/, '$1.$2');
    v = v.replace(/(\d{3})(\d)/, '$1.$2');
    v = v.replace(/(\d{3})(\d{1,2})$/, '$1-$2');
    input.value = v;
}
</script>

@endsection
