<?php define('BASEPATH') OR exit('No Direct Script Allowed'); ?>
<!DOCTYPE html>
<html>
<head>
	<meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
	<meta name="viewport" content="width=device,initial-scale=1">
	<title><?php echo $page_title ?></title>
	<meta name="description" value="<?php echo $page_description; ?>">
	<script src="https://code.jquery.com/jquery-3.2.1.min.js" integrity="sha256-hwg4gsxgFZhOsEEamdOYGBf13FyQuiTwlAQgxVSNgt4=" crossorigin="anonymous"></script>
	<?php echo $before_closing_head; ?>
</head>
<body>
<div class="container"><?php echo anchor('user/logout', 'Logout'); ?></div>
