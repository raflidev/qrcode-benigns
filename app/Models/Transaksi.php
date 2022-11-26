<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Transaksi extends Model
{
    use HasFactory;

    protected $table = "history";

    public function user()
    {
        return $this->belongsTo(User::class);
    }

    public function kupon()
    {
        return $this->belongsTo(Kupon::class);
    }

    public function admin()
    {
        return $this->belongsTo(Admin::class);
    }
}
