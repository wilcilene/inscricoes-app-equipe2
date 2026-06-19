<?php

namespace App\Models;

//use Illuminate\Contracts\Auth\MustVerifyEmail;
use Database\Factories\UserFactory;
use Illuminate\Database\Eloquent\Attributes\Fillable;
use Illuminate\Database\Eloquent\Attributes\Hidden;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use App\Models\Candidato;
use Illuminate\Database\Eloquent\Relations\HasOneThrough;
use App\Models\Inscricao;
use Illuminate\Database\Eloquent\Relations\BelongsTo; //oi

#[Fillable(["nome", "email", "password"])]
#[Hidden(["password", "remember_token"])]
class User extends Authenticatable //implements MustVerifyEmail
{
    /** @use HasFactory<UserFactory> */
    use HasFactory, Notifiable;

    /**
     * Get the attributes that should be cast.
     *
     * @return array<string, string>
     */
    protected function casts(): array
    {
        return [
            "email_verified_at" => "datetime",
            "password" => "hashed",
        ];
    }
    public function candidato(){
        return $this->hasOne(Candidato::class,'usuario_id');
    }

    public function tipoUsuario(): BelongsTo
    {
        // Troque 'TipoUsuario' pelo nome real do seu Model da outra tabela
        return $this->belongsTo(TipoUsuario::class, "tipo_usuario_id");
    }
}
