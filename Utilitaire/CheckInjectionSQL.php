<?php
function CheckInjectionSQL($texteATester)
{
	$INTERDIT=['DROP','UPDATE','--','SELECT','DELETE','ALTER','INSERT','OR','TABLE','FROM',"'",'"',';'];

	foreach ($INTERDIT as $motABannir) {

		if(strpos($texteATester, $motABannir)){

			return true;
		}
	}
	return false;
}
?>