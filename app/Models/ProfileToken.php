<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ProfileToken extends Model
{
    use HasFactory;

    /**
     * Get fillable fields
     *
     * @var array
     */
    protected $fillable =[
        'profile_id',
        'token',
        'step'
    ];

    /**
     * Get profile
     *
     * @return void
     */
    public function profile()
    {
        return $this->belongsTo(Profile::class);
    }
}
