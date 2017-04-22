<?php define('BASEPATH') OR exit('No Direct Script Allowed'); ?>
<footer>
	<div class="container">
		<p class="footer">Page rendered in <strong>{elapsed_time}</strong> seconds. <?php echo  (ENVIRONMENT === 'development') ?  'CodeIgniter Version <strong>' . CI_VERSION . '</strong>' : '' ?></p>
	</div>
</footer>
<?php echo $before_closing_body ?>
</body>
</html>