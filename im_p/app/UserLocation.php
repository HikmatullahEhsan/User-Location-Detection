<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
class UserLocation extends Model
{
    //
    use SoftDeletes;
    
    Protected $table='user_reports';
    
    Protected $fillable=['country','city','area','latitude','form_title','longitude','location_date','user_ip','note_of_location','created_by'];
}
