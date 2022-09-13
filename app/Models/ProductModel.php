<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ProductModel extends Model
{
    use HasFactory;

    protected $table = 'product_models';

    protected $fillable = [
        'name',
        'type',
        'description',
        'status'
    ];

    public function type()
    {
        return $this->hasOne(ProductTypeModel::class, 'id', 'type');
    }

    public function component()
    {
        return $this->hasMany(ProductComponentModel::class, 'product_id', 'id');
    }
}
