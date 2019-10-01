<?php
defined('BASEPATH') OR exit('No direct script access allowed');
?><!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="utf-8">
	<title>Welcome to CodeIgniter</title>
	<link rel="stylesheet" href="css/grid.css">
</head>
<body>

<div id="container">
	<h1>Welcome to CodeIgniter!</h1>

	<div class="container">
	  <div class="item item-1"> item-1 </div>
	  <div class="item item-2"> item-2 </div>
	  <div class="item item-3"> item-3 </div>
	  <div class="item item-4"> item-4 </div>
	  <div class="item item-5"> item-5 </div>
   
   <div class="item footer"> footer </div>
	</div>

	<div id="body">
		

		<p>If you are exploring CodeIgniter for the very first time, you should start by reading the <a href="user_guide/">User Guide</a>.</p>
	</div>

	<p class="footer">Page rendered in <strong>{elapsed_time}</strong> seconds. <?php echo  (ENVIRONMENT === 'development') ?  'CodeIgniter Version <strong>' . CI_VERSION . '</strong>' : '' ?></p>
</div>

</body>
</html>