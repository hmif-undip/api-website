<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Division extends Model
{
    use HasFactory, SoftDeletes;

    protected $guarded = [
        'id', 'created_at'
    ];

    public function positions()
    {
        return $this->hasMany(Position::class, 'division_id', 'id');
    }
}
