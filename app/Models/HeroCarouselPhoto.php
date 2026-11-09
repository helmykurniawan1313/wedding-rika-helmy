<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class HeroCarouselPhoto extends Model
{
    protected $fillable = ['path', 'sort_order'];

    public function url(): string
    {
        if (str_starts_with($this->path, 'wedding-content/')) {
            return asset('storage/'.$this->path);
        }

        return asset($this->path);
    }
}
