<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Casts\Attribute;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Order extends Model
{
    use HasFactory;
    protected $guarded = [];

    protected $with = ['produks'];
    protected function buktibayar(): Attribute
    {
        return Attribute::make(
            get: function ($x) {
                if ($x) {
                    return asset("admin/img/buktibayar/$x");
                }
                return false;
            },
        );
    }

    public function produks()
    {
        return $this->belongsToMany(Produk::class)
            ->withPivot('jumlah');
    }
}
