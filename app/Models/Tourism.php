<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Tourism extends Model
{
    use HasFactory;

    protected $guarded = ['id'];

    public function village()
    {
        return $this->belongsTo(Village::class);
    }

    public function getRouteKeyName()
    {
        return 'slug';
    }
}
