<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class UserGroup extends Model
{
    use HasFactory;

    protected $fillable = [
        'title',
    ];

    /**
     * 
     * get assets belonging to this group
     */
    public function assets() {
        return $this->hasMany(Asset::class);
    }

    /**
     * 
     * get users belonging to this group
     */
    public function users() {
        return $this->hasMany(Asset::class);
    }
}
