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

}
