<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Position extends Model
{
    use HasFactory, SoftDeletes;

    protected $guarded = [
        'id', 'created_at'
    ];

    public function division()
    {
        return $this->belongsTo(Division::class, 'division_id', 'id');
    }
}
