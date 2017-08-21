<?php

namespace App\Models\Authority;

use Illuminate\Database\Eloquent\Model;

class Permission extends Model
{
    protected $table = 'permissions';

    protected $fillable = [
        'name',
        'title'
    ];

    public function role()
    {
        return $this->belongsTo(Role::class);
    }
}
