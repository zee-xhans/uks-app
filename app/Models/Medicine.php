<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Medicine extends Model
{
    protected $fillable = ['name', 'stock', 'expired_date'];

    public function patients() {
        return $this->belongsToMany(Patient::class);
    }
}
