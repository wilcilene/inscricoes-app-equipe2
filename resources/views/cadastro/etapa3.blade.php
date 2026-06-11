@extends('cadastro.layout')

@section('content')

<div class="stepper-row">
    <div class="stepper">
        <div class="step-dot done"></div>
        <div class="step-line done"></div>
        <div class="step-dot done"></div>
        <div class="step-line active"></div>
        <div class="step-dot active"></div>
    </div>
    <button form="form-etapa3" type="submit" class="btn-proximo" style="background:#8fba8f;">Finalizar</button>
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
    <h2>Senha de Acesso</h2>

    <form id="form-etapa3" action="{{ route('cadastro.finalizar') }}" method="POST">
        @csrf

        {{-- Email | Confirmar Email --}}
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

        {{-- Senha | Confirmar Senha --}}
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
        <a href="{{ route('cadastro.cancelar') }}" class="btn-cancelar">Cancelar</a>
    </div>
</div>

@endsection