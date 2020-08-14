<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class ImprestStaffs extends Model
{
     /**
     * The table associated with the model.
     *
     * @var string
     */
    protected $table = 'imprestStaff';

       /**
     * The primary key associated with the table.
     *
     * @var string
     */
    protected $primaryKey = 'icode';

    public $timestamps = false;
    protected $fillable = ['icode','amount_retired','cleared','accepted_at','attachmentPath'];
}
