<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Type extends Model
{
    use HasFactory;

    /**
     * Get attributes associated with this type
     * 
     * @return void
     */
    public function attributes() {
        return $this->hasMany(TypeAttribute::class, 'id_type', 'id');
    }
}
