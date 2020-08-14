<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Designation extends Model
{
    /**
     * The table associated with the model.
     *
     * @var string
     */
    protected $table = 'designations';
    protected $fillable = ['name'];
    public $timestamps = false;

    public function Users()
    {
        return $this->hasMany('App\User');
    }
}
