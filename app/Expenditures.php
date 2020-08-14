<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Expenditures extends Model
{
    /**
     * The table associated with the model.
     *
     * @var string
     */
    protected $table = 'expenditures';
    protected $fillable = ['excode','name'];

    public function imprest()
    {
        return $this->belongsTo('App\Imprest');
    }
}
