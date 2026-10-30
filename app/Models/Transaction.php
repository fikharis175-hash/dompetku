<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

use function PHPSTORM_META\type;

class Transaction extends Model
{
    protected $fillable = [
        'type',
        'amount',
        'category',
        'description',
        'transaction_date',
    ];

    public function getIconAttribute()
    {
        $icons = [
            'Gaji' => 'bi-wallet2',
            'Transportasi' => 'bi-car-front',
            'Makanan & Minuman' => 'bi-cup-hot',
            'Kesehatan' => 'bi-heart-pulse',
            'Belanja' => 'bi-bag',
            'Hiburan' => 'bi-controller',
            'Tagihan' => 'bi-receipt',
            'Pendidikan' => 'bi-book',
            'Usaha' => 'bi-shop',
            'Pemasukan Lainnya' => 'bi-three-dots',
            'Pengeluaran Lainnya' => 'bi-three-dots',
        ];

        return $icons[$this->category] ?? 'bi-tag';
    }
}
