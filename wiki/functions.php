<?php

function convertDate($param){
	if($param=="Sin definir" or $param=="Undefined"){
		return $param;
	}
	$param=substr($param,8,2)."/".substr($param,5,2)."/".substr($param,0,4);
	return $param;
}

function convertDatetime($param){
	if($param=="Sin definir" or $param=="Undefined"){
		return $param;
	}
	$param=substr($param,8,2)."/".substr($param,5,2)."/".substr($param,0,4).' '.substr($param,11,2).':'.substr($param,14,2).':'.substr($param,17,2);
	return $param;
}

?>