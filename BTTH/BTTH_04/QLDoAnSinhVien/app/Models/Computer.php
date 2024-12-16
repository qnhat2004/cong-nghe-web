<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Computer extends Model
{
    //
    use HasFactory;     

    protected $table = "computers";
    protected $fillable = ["id", "computer_name", "model", "operating_system", "processor", "memory", "available", "created_at", "updated_at"];

    public function issues() 
    {
        return $this->hasMany(Issue::class);
    }
}
