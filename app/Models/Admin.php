<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Admin extends Model
{
    use HasFactory;

    protected $table = "admin";

    protected $fillable = [
        'nama',
        'username',
        'password',
    ];

    public function transaksi()
    {
        return $this->hasMany(Transaksi::class);
    }
}
