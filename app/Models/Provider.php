<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Provider extends Model
{
    use HasFactory, SoftDeletes;

    protected $fillable = ['name', 'email', 'phone', 'active'];

    protected $hidden = ['active'];

    protected $casts = [
    ];

    public function filterAll($request)
    {
        $providers = Provider::where('name', 'like', '%' . $request->get('keyword') . '%');

        if(!empty($request->get('email')))
            $providers = Provider::where('email', 'like', '%' . $request->get('email') . '%');

        if(!empty($request->get('phone')))
            $providers = Provider::where('phone', 'like', '%' . $request->get('phone') . '%');

        switch($request->get('order_by')){
            case 'newest':
                $providers = $providers->orderBy('created_at', 'desc');
                break;
            case 'older':
                $providers = $providers->orderBy('created_at', 'asc');
                break;
            case 'activated':
                $providers = $providers->orderBy('active', 'desc');
                break;
            case 'deactivated':
                $providers = $providers->orderBy('active', 'asc');
                break;
        }

        return $providers->paginate(10);
    }
}
