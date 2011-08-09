<?php

    header("Content-Description: CSV to PLIST");
    header("Content-Disposition: attachment; filename=CSV2PLIST.plist");
    header("Content-Type: text/xml;");

	$FILENAME = "Your File path here";
	
	$row = 1;
	$headers = array();
	echo '<?xml version="1.0" encoding="UTF-8"?>';
	echo '<!DOCTYPE plist PUBLIC "-//Apple//DTD PLIST 1.0//EN" "http://www.apple.com/DTDs/PropertyList-1.0.dtd">';
	echo '<plist version="1.0">';
	echo '<array>';
	if (($handle = fopen($FILENAME, "r")) !== FALSE) {
	    while (($data = fgetcsv($handle, 1000, ",")) !== FALSE) {
	    	if(count($headers)==0){
	    		$headers = $data;	
	    		continue;
	    	}
	
	        $num = count($data);
	
	        $row++;
	        echo "<dict>";
	        for ($c=0; $c < $num; $c++) {
				echo "<key>".$headers[$c]."</key>";
				echo "<string>".$data[$c]."</string>";
	        }
	        echo "</dict>";
	    }
	    fclose($handle);
	}
	echo '</array>';
	echo '</plist>'
?>
