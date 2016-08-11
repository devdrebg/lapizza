<?php
defined('BASEPATH') OR exit('No direct script access allowed');
?>
<!DOCTYPE html>
<html lang="pt-BR">
  <head>
    <meta charset="UTF-8">
		<title></title>
		<link rel="stylesheet" href="<?php echo base_url(); ?>public/css/bootstrap.min.css">
		<link href='https://fonts.googleapis.com/css?family=Open+Sans' rel='stylesheet' type='text/css'>
		<link rel="stylesheet" href="<?php echo base_url(); ?>public/css/public.css">
  </head>
  <body>
    <div id="contents"><?php echo $contents; ?></div>
    <div id="footer">Copyright 2008</div>

    <script src="<?php echo base_url(); ?>public/js/jquery-1.12.4.min.js"></script>
    <script src="<?php echo base_url(); ?>public/js/bootstrap.min.js"></script>
    <script src="<?php echo base_url(); ?>public/js/font-awesome.js"></script>
    <script src="<?php echo base_url(); ?>public/js/public.js"></script>
  </body>
</html>