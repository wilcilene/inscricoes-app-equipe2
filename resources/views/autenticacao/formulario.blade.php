
@extends('layouts.cadastro')

@section('formulario')

{{-- ===================== STEPPER ===================== --}}
<div class="stepper-row">
    <div class="stepper">
        <div class="step-dot {{ $etapa >= 1 ? ($etapa > 1 ? 'done' : 'active') : '' }}"></div>
        <div class="step-line {{ $etapa > 1 ? 'done' : '' }}"></div>
        <div class="step-dot {{ $etapa >= 2 ? ($etapa > 2 ? 'done' : 'active') : '' }}"></div>
        <div class="step-line {{ $etapa > 2 ? 'active' : '' }}"></div>
        <div class="step-dot {{ $etapa === 3 ? 'active' : '' }}"></div>
    </div>

    @if ($etapa < 3)
        <button form="form-etapa{{ $etapa }}" type="submit" class="btn-proximo">Próximo</button>
    @else
        <button form="form-etapa3" type="submit" class="btn-proximo" style="background:#8fba8f;">Finalizar</button>
    @endif
</div>

{{-- ===================== ERROS ===================== --}}
@if ($errors->any())
    <div class="alert alert-danger">
        <ul style="list-style:none; padding:0; margin:0;">
            @foreach ($errors->all() as $error)
                <li>• {{ $error }}</li>
            @endforeach
        </ul>
    </div>
@endif

{{-- ===================== ETAPA 1 — Dados Pessoais ===================== --}}
@if ($etapa === 1)
<div class="card">
    <h2>Dados Pessoais</h2>

    <form id="form-etapa1" action="{{ route('cadastro.salvarEtapa1') }}" method="POST">
        @csrf

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

        <div class="form-grid col-1" style="margin-bottom:18px;">
            <div class="field">
                <label>Nome Social (se houver):</label>
                <input type="text" name="nome_social"
                    value="{{ old('nome_social', $dados['nome_social'] ?? '') }}"
                    placeholder="Preencher...">
            </div>
        </div>

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
                    @foreach(['masculino' => 'Masculino', 'feminino' => 'Feminino', 'outro' => 'Outro', 'prefiro_nao_informar' => 'Prefiro não informar'] as $val => $label)
                        <option value="{{ $val }}" {{ old('genero', $dados['genero'] ?? '') == $val ? 'selected' : '' }}>
                            {{ $label }}
                        </option>
                    @endforeach
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

        <div class="form-grid col-2" style="margin-bottom:18px;">
            <div class="field">
                <label>Mãe*:</label>
                <input type="text" name="nome_mae"
                    value="{{ old('nome_mae', $dados['nome_mae'] ?? '') }}"
                    placeholder="Preencher..."
                    class="{{ $errors->has('nome_mae') ? 'is-invalid' : '' }}">
                @error('nome_mae') <span class="error-msg">{{ $message }}</span> @enderror
            </div>
        </div> 
    </form>

    <div class="card-footer">
        <a href="{{ route('login') }}" class="btn-cancelar">Cancelar</a>
    </div>
</div>

{{-- ===================== ETAPA 2 — Endereço e Contato ===================== --}}
@elseif ($etapa === 2)
<div class="card">
    <h2>Endereço e Contato</h2>

    <form id="form-etapa2" action="{{ route('cadastro.salvarEtapa2') }}" method="POST">
        @csrf

        <div class="form-grid col-2" style="margin-bottom:18px;">
            <div class="field" style="max-width:200px;">
                <label>CEP*:</label>
                <input type="text" name="cep" id="cep"
                    value="{{ old('cep', $dados['cep'] ?? '') }}"
                    placeholder="00.000-000"
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

        <div class="form-grid col-2" style="margin-bottom:18px;">
            <div class="field">
                <label>Estado*:</label>
                <input type="text" name="estado" id="estado"
                    value="{{ old('estado', $dados['estado'] ?? '') }}"
                    placeholder="Preencher..."
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

        <div class="form-grid col-2">
            <div class="field" style="max-width:220px;">
                <label>Telefone / Celular:</label>
                <input type="text" name="telefone"
                    value="{{ old('telefone', $dados['telefone'] ?? '') }}"
                    placeholder="00 0000-00000"
                    maxlength="16"
                    oninput="mascaraTelefone(this)">
            </div>
        </div>
    </form>

    <div class="card-footer">
        <a href="{{ route('login') }}" class="btn-cancelar">Cancelar</a>
    </div>
</div>

{{-- ===================== ETAPA 3 — Senha de Acesso ===================== --}}
@elseif ($etapa === 3)
<div class="card">
    <h2>Senha de Acesso</h2>

    <form id="form-etapa3" action="{{ route('cadastro.finalizar') }}" method="POST">
        @csrf

        <div class="form-grid col-2" style="margin-bottom:18px;">
            <div class="field">
                <label>Email*:</label>
                <input type="email" name="email"
                    value="{{ old('email') }}"
                    placeholder="Preencher..."
                    class="{{ $errors->has('email') ? 'is-invalid' : '' }}">
                @error('email') <span class="error-msg">{{ $message }}</span> @enderror
            </div>

            <div class="field">
                <label>Confirmar Email*:</label>
                <input type="email" name="email_confirmation"
                    value="{{ old('email_confirmation') }}"
                    placeholder="Preencher..."
                    class="{{ $errors->has('email_confirmation') ? 'is-invalid' : '' }}">
                @error('email_confirmation') <span class="error-msg">{{ $message }}</span> @enderror
            </div>
        </div>

        <div class="form-grid col-2">
            <div class="field">
                <label>Senha*:</label>
                <input type="password" name="password"
                    placeholder="Preencher..."
                    class="{{ $errors->has('password') ? 'is-invalid' : '' }}">
                @error('password') <span class="error-msg">{{ $message }}</span> @enderror
            </div>

            <div class="field">
                <label>Confirmar Senha*:</label>
                <input type="password" name="password_confirmation"
                    placeholder="Preencher..."
                    class="{{ $errors->has('password_confirmation') ? 'is-invalid' : '' }}">
                @error('password_confirmation') <span class="error-msg">{{ $message }}</span> @enderror
            </div>
        </div>
    </form>

    <div class="card-footer">
        <a href="{{ route('login') }}" class="btn-cancelar">Cancelar</a>
    </div>
</div>
@endif

{{-- ===================== SCRIPTS ===================== --}}
@if ($etapa === 1)
<script>
function mascaraCPF(input) {
    let v = input.value.replace(/\D/g, '').substring(0, 11);
    v = v.replace(/(\d{3})(\d)/, '$1.$2');
    v = v.replace(/(\d{3})(\d)/, '$1.$2');
    v = v.replace(/(\d{3})(\d{1,2})$/, '$1-$2');
    input.value = v;
}
</script>
@elseif ($etapa === 2)
<script>
function mascaraCEP(input) {
    let v = input.value.replace(/\D/g, '').substring(0, 8);
    v = v.replace(/(\d{2})(\d)/, '$1.$2');
    v = v.replace(/(\d{3})(\d{1,3})$/, '$1-$2');
    input.value = v;
}

function mascaraTelefone(input) {
    let v = input.value.replace(/\D/g, '').substring(0, 11);
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
    } catch (e) {}
}
</script>
@endif

@endsection