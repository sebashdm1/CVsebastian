<?php

namespace app\models;
use Illuminate\Database\Eloquent\Model;	


class project extends Model {
 	
 	protected $table = 'projects';


 	public function getDurationAsString(){

		$years = floor( $this->months / 12);
		$extraMonths = $this->months % 12;

		if($years==0){
			return "Project duration:  $extraMonths  months";
		}else if($years != 0){
		    return "Project Duration: $years years $extraMonths  months";
       }

    }

}