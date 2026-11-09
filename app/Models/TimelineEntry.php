<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class TimelineEntry extends Model
{
    protected $fillable = ['year', 'title', 'description', 'photo', 'sort_order'];

    public function photoUrl(): string
    {
        if (! $this->photo) {
            return '';
        }

        if (str_starts_with($this->photo, 'wedding-content/')) {
            return asset('storage/'.$this->photo);
        }

        return asset($this->photo);
    }
}
