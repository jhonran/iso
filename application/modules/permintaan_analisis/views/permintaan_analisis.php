<style>
	.table td, .table th {
		vertical-align: middle;
	}
</style>
<div class="card">
	<div class="card-body">
		<h2><button type="button" class="add btn btn-primary"><i class="icon-plus"></i> Tambah Data </button></h2>
		<div class="clearfix"></div>
		<div>
			<table id="example2" class="table table-bordered table-hover" data-name="cool-table">
                <thead>
                  <tr>
                    <th>Nomor</th>
                    <th>Tanggal Masuk</th>
                    <th>Tanggal Deadline</th>
                    <th>Klien</th>
                    <th>Nama Sample</th>
                    <th>Manager Teknis</th>
                    <th>Aksi</th>
                  </tr>
                </thead>
                <tbody>
                	<?php $no=1;
                		foreach($datatables->result() as $row){
        					echo "<tr>";
        					echo "<td>".$no."</td>";
        					echo "<td>".$row->tanggal_permintaan."</td>";
        					echo "<td>".$row->tanggal_deadline."</td>";
        					echo "<td>".$row->id_klien."</td>";
        					echo "<td>".$row->nama_sample."</td>";
        					echo "<td>".$row->manager_teknis."</td>";
        					echo "<td>
        					<button type='button' class='btn btn-outline-warning btn-xs' onClick='edit(".$row->id_permintaan_analisis.")' ><i class='icon-pencil'></i></button>
            				<button type='button' class='btn btn-outline-danger btn-xs' onClick=del('".$row->id_permintaan_analisis."') ><i class='icon-trash'></i></button>
            					</td>";
        					echo "</tr>";
    						$no++;
    					} 
    				?>
                </tbody>
            </table>
		</div>	
	</div>
</div>
<script type="text/javascript">
	$(document).ready(function() {
		$('#datatables').dataTable();
		$('.add').click(function(){
			$('#addModal').modal('show');
			$('#form')[0].reset();
		});
		$('#save').click(function(){
			$.ajax({
				url :"<?php echo site_url();?>permintaan_analisis/tambah_permintaan",
				type:"post",
				data:$("#form").serialize(),
				success:function(){
					$('#addModal').modal('hide');
					location.reload();
				}
			})
		});
		$('#saveEdit').click(function(){
			$.ajax({
				url :"<?php echo site_url();?>permintaan_analisis/edit_permintaan",
				type:"post",
				data:$("#form2").serialize(),
				success:function(){
					$('#editModal').modal('hide');
					location.reload();
				}
			})
		});
	});
function edit(id){
	$.getJSON('<?php echo site_url();?>permintaan_analisis/edit_permintaan_analisis/'+id,
		function( response ) {
			$("#editModal").modal('show');
			$("#id_permintaan").val(response['id_permintaan_analisis']);
			$("#klien").val(response['id_klien']);
			$("#permintaan").val(response['tanggal_permintaan']);
			$("#deadline").val(response['tanggal_deadline']);
			$("#sample").val(response['nama_sample']);
			$("#teknis").val(response['manager_teknis']);
		}
	);
}
function del(id){
	if(confirm('Yakin menghapus data ?')){
		$.ajax({
				url :"<?php echo site_url();?>permintaan_analisis/hapus_permintaan/"+id,
				type:"post",
				success:function(){
					location.reload();
				}
			})
	}
}
</script>
<div class="modal fade bs-example-modal-lg" id="addModal" tabindex="-1" role="dialog" aria-hidden="true">
	<div class="modal-dialog modal-lg">
		<div class="modal-content">

			<div class="modal-header">
				<h4 class="modal-title" id="myModalLabel">Tambah Data Permintaan Analisis</h4>
            </div>
			<div class="modal-body">
			<form class="form-horizontal form-label-left" id="form" name="form">
				<div class="form-group">
                    <label class="control-label col-sm-3 col-sm-3 col-xs-12">ID Klien</label>
                    <div class="col-md-12 col-sm-12 col-xs-12">
                        <input type="text" class="form-control" id="id_klien" name="id_klien" placeholder="ID Klien" />
                    </div>
                </div>
                <div class="clearfix"></div>
                <div class="row">
                	<div class="col-md-6">
                		<div class="form-group">
                    		<label class="control-label col-sm-12 col-sm-12 col-xs-12">Tanggal Permintaan</label>
                    		<div class="col-md-12 col-sm-12 col-xs-12">
                        		<input type="date" class="form-control" id="tanggal_permintaan" name="tanggal_permintaan" placeholder="Tanggal Permintaan" />
                    		</div>
                		</div>	
                	</div>
                	<div class="col-md-6">
                		<div class="form-group">
                    		<label class="control-label col-sm-12 col-sm-12 col-xs-12">Tanggal Deadline</label>
                    		<div class="col-md-12 col-sm-12 col-xs-12">
                        		<input type="date" class="form-control" id="tanggal_deadline" name="tanggal_deadline" placeholder="Tanggal Deadline" />
                   	 		</div>
                		</div>	
                	</div>
                </div>
                	
				
                <div class="clearfix"></div>
                <div class="form-group">
                    <label class="control-label col-sm-3 col-sm-3 col-xs-12">Nama Sample</label>
                    <div class="col-md-12 col-sm-12 col-xs-12">
                        <input type="text" class="form-control" id="nama_sample" name="nama_sample" placeholder="Nama Sample" />
                    </div>
                </div>
                <div class="form-group">
                    <label class="control-label col-sm-3 col-sm-3 col-xs-12">Manager Teknis</label>
                    <div class="col-md-12 col-sm-12 col-xs-12">
                        <input type="text" class="form-control" id="manager_teknis" name="manager_teknis" placeholder="Manager Teknis" />
                    </div>
                </div>
			</form>
            </div>
            <div class="modal-footer">
				<button type="button" class="btn btn-default" data-dismiss="modal"><i class="icon-close"></i> <span>Tutup</span></button>
                <button type="button" class="btn btn-primary" id="save"><i class="icon-check"></i> <span>Simpan</span></button>
            </div>
		</div>
	</div>
</div>
<div class="modal fade bs-example-modal-lg" id="editModal" tabindex="-1" role="dialog" aria-hidden="true">
	<div class="modal-dialog modal-lg">
		<div class="modal-content">

			<div class="modal-header">
				<h4 class="modal-title" id="myModalLabel">Edit Data Permintaan Analisis</h4>
            </div>
			<div class="modal-body">
			<form class="form-horizontal form-label-left" id="form2" name="form2">
					
				<div class="form-group">
                    <label class="control-label col-sm-3 col-sm-3 col-xs-12">ID Klien</label>
                    <div class="col-md-12 col-sm-12 col-xs-12">
                    	<input type="hidden" class="form-control" id="id_permintaan" name="id_permintaan" />
                        <input type="text" class="form-control" id="klien" name="klien" placeholder="Klien" />
                    </div>
                </div>
                <div class="clearfix"></div>
                <div class="form-group">
                    	<label class="control-label col-sm-3 col-sm-3 col-xs-12">Tanggal Permintaan</label>
                    	<div class="col-md-12 col-sm-12 col-xs-12">
                        	<input type="text" class="form-control" id="permintaan" name="permintaan" placeholder="Tanggal Permintaan" />
                    	</div>
                	</div>
				<div class="form-group">
                    	<label class="control-label col-sm-3 col-sm-3 col-xs-12">Tanggal Deadline</label>
                    	<div class="col-md-12 col-sm-12 col-xs-12">
                        	<input type="text" class="form-control" id="deadline" name="deadline" placeholder="Tanggal Deadline" />
                   	 	</div>
                	</div>
                <div class="clearfix"></div>
                <div class="form-group">
                    <label class="control-label col-sm-3 col-sm-3 col-xs-12">Nama Sampel</label>
                    <div class="col-md-12 col-sm-12 col-xs-12">
                        <input type="text" class="form-control" id="sample" name="sample" placeholder="Nama Sample" />
                    </div>
                </div>
                <div class="form-group">
                    <label class="control-label col-sm-3 col-sm-3 col-xs-12">Manager Teknis</label>
                    <div class="col-md-12 col-sm-12 col-xs-12">
                        <input type="text" class="form-control" id="teknis" name="teknis" placeholder="Manager Teknis" />
                    </div>
                </div>
			</form>
            </div>
            <div class="modal-footer">
				<button type="button" class="btn btn-default" data-dismiss="modal"><i class="icon-close"></i> <span>Tutup</span></button>
                <button type="button" class="btn btn-primary" id="saveEdit"><i class="icon-check"></i> <span>Simpan</span></button>
            </div>
		</div>
	</div>
</div>