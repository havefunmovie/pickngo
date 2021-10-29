<?php

namespace App\Models\Traits\User;

trait Info
{
    public function getFullNameAttribute(): string
    {
        return "{$this->name} {$this->family}";
    }

    public function avatar($bgColor = 'EBF4FF', $color = '7F9CF5'): string
    {
        if (!is_null($this->profile_photo_path))
            return asset('/storage/' . $this->profile_photo_path);

        return 'https://ui-avatars.com/api/?name=' . urlencode($this->name) . "&color={$color}&background={$bgColor}";
    }

    public function isAdmin()
    {
        return in_array($this->level,['admin','administrator','developer']);
    }
}
