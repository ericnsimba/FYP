<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class UserDepartments extends Model
{
     /**
     * The table associated with the model.
     *
     * @var string
     */
    protected $table = 'usersDepartment';
    public $timestamps = false;
    protected $fillable = ['departmentId','employmentNumber'];
}
