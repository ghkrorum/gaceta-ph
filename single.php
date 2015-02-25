<?php 
if ((isset($_GET['gallery']))){
  include('_single-gallery.php');
}else{
  include('_single.php');
}
?>
