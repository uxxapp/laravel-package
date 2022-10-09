<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class AccountUserMember extends Model
{
    use HasFactory;

    public const DEFAULT_AVATAR = '/img/default-avatar.png';

    public function getAvatarAttribute(): string
    {
        return $this->attributes['avatar'] ?? self::DEFAULT_AVATAR;
    }
}
