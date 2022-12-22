<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Kupon extends Model
{
    use HasFactory;

    protected $table = 'kupon';

    protected $fillable = [
        'benefit',
        'kodeunik',
        'expired_at',
        'max_use',
    ];

    public function transaksi()
    {
        return $this->hasMany(Transaksi::class);
    }
}
