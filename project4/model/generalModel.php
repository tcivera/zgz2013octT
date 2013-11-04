<?php

/**
 * Read .ini config file
 * @param string $filename Configuration file
 * @return array Config data
 */
function readConfigFile($filename,$state) {
	$config = parse_ini_file($filename,true);
	$configR = array();
	foreach ($config as $key => $values) {
		$key1 = $key . ":";
		if (strpos($key1,$state) !== FALSE && strpos($key1,$state) < strpos($key1,":")) {
			$names = explode(":",$key1);
			$nameRoot = $names[1];
			//The parent configuration
			if (isset($config[$nameRoot])) {			
				$configR = $config[$nameRoot];
			}	
			//Esto se podría hacer con un array_merge
			//$configR = array_merge($config[$nameRoot], $values);		
			foreach ($values as $key2 => $value) {
				$configR[$key2] = $value;
			}
			break;
		}
	}
	return $configR;
}