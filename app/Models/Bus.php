<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class Bus extends Model
{
public function status(): BelongsTo
    {
        return $this->belongsTo(Status::class);
    } 
        public function getAge()
    {
        return Date('Y') - $this->year;
    }
}
