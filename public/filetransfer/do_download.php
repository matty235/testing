<?php
$filelocation = $_GET['path'];
  $filename = basename($filelocation); 
  if (file_exists($filelocation)) {
    header('Content-Description: File Transfer');
    header('Content-Type: application/octet-stream');
    header('Content-Disposition: attachment; filename='.$filename); 
    header('Content-Transfer-Encoding: binary');
    header('Expires: 0');
    header('Cache-Control: must-revalidate, post-check=0, pre-check=0');
    header('Pragma: public');
    header('Content-Length: ' . filesize($filelocation));
    header("Content-Type: application/force-download"); 
    ob_clean();
    flush();
    readfile($filelocation);
    exit;
  }
?>
