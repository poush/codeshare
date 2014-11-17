<?php 
$data = DB::table('config')->get();
$toreturn = [];
foreach ($data as $dat) {
	$toreturn[$dat->key] = $dat->value;
}
return $toreturn;
?>