<?php

namespace App\Models;

//use Illuminate\Contracts\Auth\MustVerifyEmail;
use Database\Factories\UserFactory;
use Illuminate\Database\Eloquent\Attributes\Fillable;
use Illuminate\Database\Eloquent\Attributes\Hidden;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use App\Models\TipoUsuario;
use App\Models\Candidato;
use Illuminate\Database\Eloquent\Relations\HasOneThrough;


#[Fillable(["nome", "email", "password", "tipo_usuario_id"])]
#[Hidden(["password", "remember_token"])]
class User extends Authenticatable //implements MustVerifyEmail
{
    /** @use HasFactory<UserFactory> */
    use Notifiable;

     public function tipoUsuario(): BelongsTo
    {
        return $this->belongsTo(TipoUsuario::class, 'tipo_usuario_id');
    }

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

}
