<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use JetBrains\PhpStorm\ArrayShape;
use Laravel\Sanctum\HasApiTokens;

class AccountUser extends Authenticatable
{
    use HasApiTokens, HasFactory, Notifiable;

    protected $fillable = [
        'phone',
        'email',
        'username',
        'password',
        'status',
        'login_times',
        'last_login_ip_at',
        'last_login_at',
        'create_ip_at',

    ];

    protected $hidden = [
        'password',
    ];

    #[ArrayShape(['token_type' => 'string', 'token' => 'string'])]
    public function createDeviceToken(
        ?string $device = null
    ): array {
        return [
            'token_type' => 'bearer',
            'token' => $this->createToken($device ?? Device::PC)->plainTextToken,
        ];
    }

    protected static function booted()
    {
        static::saving(
            function (AccountUser $user) {
                $user->email = $user->email ?? $user->phone;
                $user->username = $user->username ?? $user->phone;
            }
        );
    }
}
