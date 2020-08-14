<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Department extends Model


{
 /**
     * The table associated with the model.
     *
     * @var string
     */
    protected $table = 'departments';
    protected $fillable  = ['name'];

    public function employee()
    {
        return $this->hasMany('App\User');
    }
}
