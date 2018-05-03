<style>
	.table td, .table th {
		vertical-align: middle;
	}
</style>
<div class="card">
	<div class="card-body">
        <div class="row">
            <div class="col-md-6">
                <a href="<?php echo base_url('database/manual_database') ?>" class="btn btn-primary"><i class="icon-plus"></i> <span>Manual Backup Database</span></a>
            </div>    
        </div>
        
		<div class="clearfix"></div>	
	</div>
</div>
<script type="text/javascript">
$(document).ready(function() {
	$('#datatables').dataTable();
	$('.auto-backup').click(function(){
		$('#addModal').modal('show');
		$('#form')[0].reset();
	});
});
</script>
