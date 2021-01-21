<?php
require_once("../config.php");
if (isset($_GET['id'])) {
	$indel = $_GET['id'];
	$pdel = $db->prepare("DELETE FROM input WHERE idinput=$indel");
	$handle = "<script type='text/javascript'>
				  alert('Data telah Dihapus');
				  location.replace('index.php?msg=Success');
				</script>";
	/*Error Handle}*/
	if ($pdel->execute()) {
	  echo $handle;
	} else {
	  echo implode($pdel->errorInfo());
	}
}
?>