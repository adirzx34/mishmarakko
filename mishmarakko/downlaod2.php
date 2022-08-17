<?php
include "config.php";
	if(!empty($GET['file'])){
		$fileName = basename($_GET['file']);
		$filePath = "pdf/".$fileName;
		
		if(!empty($fileName) && file_exists($filePath)){
			// define header 
			header("Cache-Control: public");
			header("Content-Description: File transfer");
			header("Content-Disposition: attachment; filename=$fileName");
			header("Content-Type: application/zip");
			header("Content-Transfer-Encoding: binary");
			
			// read file 
			readFile($filePath);
			exit;
		}
		else{
			echo "file not exit";
		}
	}
?>