<?php
$regEx = array(
    "number_invoice" => "#^F{1}[0-9]{8}-{1}[0-9]{3}$#",
    "date" => "#^[0-9]{4}[-./]{1}[0-9]{2}[-./]{1}[0-9]{2}$#",
    "contact_name" => "#^[0-9]{1,20}$#",
    "companie_name" => "#^[0-9]{1,20}$#",
    "option_create" => "#^[a-z]{1,20}#",
    "last_name" => "#^[\p{Latin}\][a-zA-Z]{2,20}[- ]?[\p{Latin}\][a-zA-Z]{0,20}[\p{Latin}\][a-zA-Z]{1}$#u",
    "first_name" => "#^[\p{Latin}\][a-zA-Z]{2,20}[- ]?[\p{Latin}\][a-zA-Z]{0,20}[\p{Latin}\][a-zA-Z]{1}$#u",
    "phone" =>  "#^[0-9]{9,10}$#",
    "email" => "#^[a-zA-Z0-9]{1}[a-zA-Z0-9.-]{1,20}@[a-zA-Z]{3,20}.[a-zA-Z0-9]{2,3}$#",
    "company" => "#^[0-9]{1,20}$#",
    "type_comp" => "#^[0-9]{1,20}$#", 
    "phone_comp" => "#^[0-9]{9,10}$#",
    "name_comp" => "#^[a-zA-Z0-9]{1}#",
    "tva_comp" => "#^B{1}E{1}0{1}[0-9]{9}$#",
    "send" => "#send#"	
);
function isEmptyForm()
{
	if(isset($_GET))
	{
		foreach($_GET as $key => $value)
		{			
			if(empty($_GET[$key]))
			{
				return false;
			}
		}
	}
	return true;
}


function isValidateForm($regEx)
{
	$isValidate = true ;
	foreach($_GET as $key => $value)
	{
		var_dump(preg_match($regEx[$key],$_GET[$key]));
		if(!preg_match($regEx[$key],$_GET[$key]))
		{
			$isValidate = false;
		}
	}
	return $isValidate;
}
?>