<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class RequestTourism extends Model
{
    use HasFactory;

    protected $guarded = ['id'];

    public function user()
    {
        return $this->belongsTo(User::class);
    }

    public function village()
    {
        return $this->belongsTo(Village::class);
    }

    public function getRouteKeyName()
    {
        return 'slug';
    }
}
