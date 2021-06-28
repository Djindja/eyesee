<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Result extends Model
{

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'hit', 'miss', 'left'
    ];

    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $hidden = [

    ];

    public function user()
    {
        return $this->BelongsTo(User::class);
    }

}