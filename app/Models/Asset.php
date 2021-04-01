<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Asset extends Model
{
    use HasFactory;

    protected $fillable = [
        'name',
        'asset_type_id',
        'user_id',
        'user_group_id',
    ];

    /**
     * 
     * get assets belonging to this type
     */
    public function assets() {
        return $this->hasMany(Asset::class);
    }
}
