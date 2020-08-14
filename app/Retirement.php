<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Retirement extends Model
{
    /**
     * The table associated with the model.
     *
     * @var string
     */
    protected $table = 'retirement';
       /**
     * The primary key associated with the table.
     *
     * @var string
     */

     protected $fillable = ['id','rcode','icode','totalAmount','accepted_at','status'];

    protected $primaryKey = 'rcode';

    // public $incrementing = false;

    public function attachments()
    {
        return $this->hasMany('App\Attachments');
    }

}
