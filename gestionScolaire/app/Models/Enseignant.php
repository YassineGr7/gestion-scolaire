<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Enseignant extends Model
{
    use HasFactory;
    protected $guarded = [] ;


    public function modules() {
      return $this->belongsToMany(Module::class);
    }
}
