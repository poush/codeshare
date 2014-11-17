<?php

class install
{
	public static function ins(){

		$fileSql = ("1"== Input::get('update'))?'upsql.sql':'sqldump.sql';
		$lines = file(app_path()."/$fileSql");

		// Temporary variable, used to store current query
		$templine = '';

		// Loop through each line
		foreach ($lines as $line){

			// Skip it if it's a comment
			if (substr($line, 0, 1) == '--' || $line == '')
			    continue;

			// Add this line to the current segment
			$templine .= $line;
			// If it has a semicolon at the end, it's the end of the query
			if (substr(trim($line), -1, 1) == ';'){
			    // Perform the query
				DB::statement($templine);
			    // Reset temp variable to empty
			    $templine = '';
			}
		}


		unlink(public_path().'/install/index.php');
		unlink(public_path().'/install/step2.php');
		unlink(public_path().'/install/step3.php');

		$lines = file(app_path().'/routes.php'); 
		$lines = array_chunk($lines, (64-5));

			// write the new data to the file 
		$fp = fopen(app_path().'/routes.php', 'w'); 
		fwrite($fp, implode('', $lines[0])); 
		fclose($fp); 

		unlink(app_path().'/models/install.php');

		return Redirect::to('../../admin');
	}
	public static function recursiveRemoveDirectory($directory)
	{
	    foreach(glob("{$directory}/*") as $file)
	    {
	        if(is_dir($file)) { 
	            self::recursiveRemoveDirectory($file);
	        } else {
	            unlink($file);
	        }
	    }
	    rmdir($directory);
	}
}


?>