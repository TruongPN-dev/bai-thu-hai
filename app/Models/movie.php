<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class movie extends Model
{
       /**
     * The table associated with the model.
     *
     * @var string
     */
    protected $table = 'film_management';

    /**
     * The attributes that aren't mass assignable.
     *
     * @var array
     */
    protected $guarded = [];
}
