<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Patient extends Model
{
    // Allow mass assignment for these fields
    protected $fillable = ['name', 'class', 'complaint', 'visit_date'];

    public function medicines() {
        return $this->belongsToMany(Medicine::class);
    }
}
