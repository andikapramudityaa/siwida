<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Village extends Model
{
    use HasFactory;

    protected $guarded = ['id'];

    public function tourism()
    {
        return $this->hasMany(Tourism::class);
    }

    public function getRouteKeyName()
    {
        return 'slug';
    }
}
