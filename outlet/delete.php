<?php
require_once("../config.php");
if (isset($_GET['id'])) {
	$odel = $_GET['id'];
	$cdel = $db->prepare("SELECT * FROM input WHERE outlet=$odel");
	$cdel->execute();
	$crow=$cdel->fetch(PDO::FETCH_ASSOC);
	if ($crow != 0) {
?>
		<script>
		  alert("DATA TIDAK BISA DIHAPUS, DATA TELAH TERPAKAI !");
		  location.replace("index.php?msg=Data Exists");
		</script>
		<?php
		goto END;
	} else {
		$pdel = $db->prepare("DELETE FROM outlet WHERE idoutlet=$odel");
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
}
END:
?>