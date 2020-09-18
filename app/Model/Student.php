<?php

namespace App\Model;

use Illuminate\Database\Eloquent\Model;

class Student extends Model
{
    //Assign a table.
    protected $table = 'student';

    protected $fillable = [
        'estatus',
        'course',
        'yearlevel',
        'section',
        'idnumber',
        'firstname',
        'middlename',
        'lastname',
        'extensionname',
        'gender',
        'birthdate',
        'emailaddress',
        'contactnumber',
        'purok',
        'barangay',
        'municipality',
        'province',
        'ffirstname',
        'fmiddlename',
        'flastname',
        'mfirstname',
        'mmiddlename',
        'mlastname',
        'gcontactnumber'
    ];

}
