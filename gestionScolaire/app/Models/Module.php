<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Module extends Model
{
    use HasFactory;

    protected $guarded = [];


    public function enseignants() {
      return $this->belongsToMany(Enseignant::class);
    }

    public function students() {
      return $this->belongsToMany(Student::class);
    }
}
