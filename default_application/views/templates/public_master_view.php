<?php define('BASEPATH') OR exit('No Direct Script Allowed');
$this->load->view('templates/_parts/public_master_header_view'); ?>
<?php echo $the_view_content; ?>
<?php $this->load->view('templates/_parts/public_master_footer_view'); ?>