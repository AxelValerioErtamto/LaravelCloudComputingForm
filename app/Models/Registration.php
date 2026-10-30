<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Registration extends Model
{
    /** How many days the confirmation link stays valid. */
    public const CONFIRM_DAYS = 7;

    protected $fillable = [
        'name',
        'email',
        'password',
        'birthdate',
        'token',
    ];

    protected $hidden = [
        'password',
        'token',
    ];

    protected $casts = [
        'birthdate' => 'date',
        'confirmed_at' => 'datetime',
    ];

    /** Human-friendly ID shown in the email, e.g. CC25-0007. */
    public function getCodeAttribute(): string
    {
        return 'CC25-' . str_pad((string) $this->id, 4, '0', STR_PAD_LEFT);
    }

    public function confirmDeadline()
    {
        return $this->created_at->copy()->addDays(self::CONFIRM_DAYS);
    }

    public function isExpired(): bool
    {
        return now()->greaterThan($this->confirmDeadline());
    }
}
