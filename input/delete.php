<?php
require_once("../config.php");
if (isset($_GET['id'])) {
	$indel = $_GET['id'];
	$pdel = $db->prepare("DELETE FROM karyawan WHERE idkar=$indel");
	$handle = "<script type='text/javascript'>
				  alert('Data telah Dihapus');
				  location.replace('index.php?msg=Deleted');
				</script>";
	/*Error Handle}*/
	if ($pdel->execute()) {
	  echo $handle;
	} else {
	  echo implode($pdel->errorInfo());
	}
}
?>