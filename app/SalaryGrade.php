<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class SalaryGrade extends Model
{
     /**
     * The table associated with the model.
     *
     * @var string
     */
    protected $table = 'salaryGrades';
    public $timestamps = false;
    protected  $fillable = ['grade','from','to'];
}
