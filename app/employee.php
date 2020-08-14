<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class employee extends Model
{
    /**
     * The table associated with the model.
     *
     * @var string
     */
    protected $table = 'username';

    /**
     * get the user who is this employer
     * public function user(){
     *  return $this->belongsTo('App\User');
     * 
     */
    
     public function desiginaion  (){
         return $this->hasOneThrough('App\Desigination','App\UserDesignations');
     }
    
     public function salaryGrade()
     {
         return $this->hasOneThrough('App\SalaryGrade','App\UserSalaryGrades');
     }

     public function imprest()
     {
         return $this ->hasManyThrough('App\Imprest','App\ImprestStaffs');
     }
     
     public function Retirement()
     {
         return $this->hasManyThrough('App\Retirement','App\RetirementStaffs');
     }
     public function department()
     {
         return $this->belongsTo('App\Department');
     }


}
