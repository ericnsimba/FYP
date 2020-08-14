<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class UserSalaryGrades extends Model
{
     /**
     * The table associated with the model.
     *
     * @var string
     */
    protected $table = 'usersSalaryGrade';
    public $timestamps = false;
    protected $fillable = ['gradeId','employmentNumber'];

}
