<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Product extends Model
{
    use HasFactory;

    protected $fillable = ['name', 'provider', 'price', 'manufacturing_date', 'expiration_date'];

    public function getPriceFormatedAttribute()
    {
        return 'R$ '. number_format($this->attributes['price'], 2, ',', '.');
    }

    protected $casts = [
        'manufacturing_date' => 'datetime',
        'expiration_date' => 'datetime'
    ];

    public function filterAll($request)
    {
        $products = Product::where('name', 'like', '%' . $request->get('keyword') . '%')
        ->where('price','>=', $request->get('price_from') ?? 0)
        ->where('price','<=', $request->get('price_to')?? 0);

        switch($request->get('order_by')){
            case 'newest':
                $products = $products->orderBy('created_at', 'desc');
                break;
            case 'older':
                $products = $products->orderBy('created_at', 'asc');
                break;
            case 'price_desc':
                $products = $products->orderBy('price', 'desc');
                break;
            case 'price_asc':
                $products = $products->orderBy('price', 'asc');
                break;
        }

        return $products->paginate(10);
    }
}