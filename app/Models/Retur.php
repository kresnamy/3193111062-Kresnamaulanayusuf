<?php

namespace App\Models;

use App\Models\Feature\Order;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Retur extends Model
{
    use HasFactory;
    protected $guarded = [];

    public function pesanan()
    {
        return $this->belongsTo(Order::class, 'invoice_number', 'invoice_number');
    }

    public function getImagePathAttribute()
    {
        return asset('storage/' . $this->image);
    }
}
