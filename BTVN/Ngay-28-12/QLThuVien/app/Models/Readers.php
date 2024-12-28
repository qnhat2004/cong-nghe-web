<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Readers extends Model
{
    //
    use HasFactory;

    protected $fillable = ['id', 'name', 'birthday', 'address', 'phone'];

    public function Borrows()
    {
        return $this->hasMany(Borrows::class, 'reader_id', 'id');
    }
}
