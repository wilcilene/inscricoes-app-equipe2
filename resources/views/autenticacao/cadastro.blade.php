@extends('layouts.auth')

@section('form')
  


<input type="email" name="email" placeholder="Digite seu email" required>
            </div>
            <div class="form-group">
                <label>Senha:</label>
                <input type="password" name="password" placeholder="Digite sua senha" required>
            </div>
            <div class="buttons">
                <button type="button" class="btn btn-cadastrar"
                        onclick="mostrarPainel('cadastro', null)">
                    Cadastrar
                </button>
                <button type="submit" class="btn btn-entrar">
                    Entrar
                </button>
            </div>
        </form>

    </div>


@endsection