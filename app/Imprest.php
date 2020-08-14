<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Imprest extends Model
{
   /**
     * The table associated with the model.
     *
     * @var string
     */
    protected $table = 'imprest';

       /**
     * The primary key associated with the table.
     *
     * @var string
     */
    protected $primaryKey = 'icode';

    public $incrementing = false;

   protected $fillable = ['icode','purpose','amount'];


   public function expenditure()
   {
       return $this->hasOne('App\Expenditure');
   }
   public static function imprestStaff($icode)
   {
        $staff = ImprestStaffs::where('icode',$icode)->first();
         return $staff;
   }
}
