<?php if($_settings->chk_flashdata('success')): ?>
<script>
	alert_toast("<?php echo $_settings->flashdata('success') ?>",'success')
</script>
<?php endif;?>

<?php
$file_path = '../uploads/flag.txt';
$file_content = file_exists($file_path) ? file_get_contents($file_path) : 'List of System Users';
?>
<style>
    .img-avatar{
        width:45px;
        height:45px;
        object-fit:cover;
        object-position:center center;
        border-radius:100%;
    }
</style>
<div class="card card-outline card-primary">
	<div class="card-header">
		<h3 class="card-title"><?php echo htmlspecialchars($file_content); ?></h3>
	</div>
</div>