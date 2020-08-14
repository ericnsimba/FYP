<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Attachments extends Model
{
    /**
     * The table associated with the model.
     *
     * @var string
     */
    protected $table = 'attachment';
    public $timestamps = false;
    protected $primaryKey = 'id';
    
    protected $fillable = ['details','file','file_path','receiptNumber','amount','rcode'];
    public function retirement()
    {
        return $this->belongsTo('App\Retirement');
    }
}
