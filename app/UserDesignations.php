<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class UserDesignations extends Model
{
     /**
     * The table associated with the model.
     *
     * @var string
     */
    protected $table = 'usersDesignation';
    public $timestamps = false;
    protected $fillable = ['employmentNumber','designationId'];
}
