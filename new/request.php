<?php
if (isset($_REQUEST['request'])) {
	echo "approved ".$_POST['id'];

}
else if (isset($_REQUEST['cancel'])) {
	echo "canceled ".$_POST['id'];
	}

?>