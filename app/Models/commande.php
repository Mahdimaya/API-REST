<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Commande extends Model    {
        public static function create(array $data)
{
    $commande = new Commande();
    $commande->user_id = $data['id'];
    $commande->produit_id = $data['numero'];
    $commande->produit_id = $data['otp'];

    $commande->save();

    return $commande;
}
        use Notifiable;

        protected $fillable = [
            'phone',  'otp',
        ];

        protected $hidden = [
             'remember_token',
        ];

        protected $casts = [
            'email_verified_at' => 'datetime',
        ];

        public static $rules = [
            'phone' => 'required|string|max:255|unique:users',
            'otp' => 'nullable|string',
        ];

        public function sendPasswordResetNotification($token)
        {
            $this->notify(new ResetPasswordNotification($token));
        }
    }
