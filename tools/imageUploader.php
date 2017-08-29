<?php
chdir( ".." );
include "config/config_include.php";
// die(print_r($_FILES));
if( !empty( $_FILES ) )
{
	$IMG = new ImgController( $smarty );
	$IMG->uplAll();
}

//get the good controller
if( !$reqError )
{
	$FC = new $ControllerName( $smarty, $yourSettingsTxt );
}
//if any error, we call the frontController with an error msg
else
{
	$FC = new FrontController( $smarty, $yourSettingsTxt );
	echo 'The `myLocalUse` in your config.json is incorrect';
}
$FC->catchGlobData();
$FC->displayTpl( $templateList, $repoScan, $allowParentLink );
?>
