<?php


class Debug {


	public static function consoleMessage($unMessage) {
		echo '<script>';
		echo 'console.log('. json_encode( "[" . date("d/m/Y") . " " . date("H:i:s") . "] ==>" . $unMessage . "<==") .')';
		echo '</script>';
	  }

	  
	public static function boiteMessage($leMessage) {
        echo "<script>alert(\"" . $leMessage . "\");</script>";
	}

}