<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Casts\Attribute;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Produk extends Model
{
    use HasFactory;
    use HasFactory;

    protected $guarded = [];

    protected function foto(): Attribute
    {
        return Attribute::make(
            get: function ($x) {
                if ($x) {
                    return asset("admin/img/produks/$x");
                }
                return 'https://tse4.mm.bing.net/th?id=OIP.aV3_1sg9QEdADlu5byNWbwAAAA&pid=Api&P=0&h=180';
            },
        );
    }

    public function orders()
    {
        return $this->belongsToMany(Order::class)->withPivot('jumlah');
    }
}
