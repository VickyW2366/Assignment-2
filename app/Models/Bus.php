<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Bus extends Model
{
    //
        public function getAge()
    {
        return Date('Y') - $this->year;
    }
}
