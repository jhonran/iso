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
                    <th>Nama Hak Akses</th>
                    <th>Aksi</th>
                  </tr>
                </thead>
                <tbody>
                    <?php $no=1;
                        foreach($datatables->result() as $row){
                            echo "<tr>";
                            echo "<td>".$no."</td>";
                            echo "<td>".$row->nama_level_user."</td>";
                            echo "<td>
                            <button type='button' class='btn btn-outline-warning btn-xs' onClick='edit(".$row->id_level_user.")' ><i class='icon-pencil'></i></button>
                            <button type='button' class='btn btn-outline-danger btn-xs' onClick=del('".$row->id_level_user."') ><i class='icon-trash'></i></button>
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
				url :"<?php echo site_url();?>level_user/tambah_level_user",
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
				url :"<?php echo site_url();?>level_user/edit_level_user",
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
	$.getJSON('<?php echo site_url();?>level_user/edit_data_level_user/'+id,
		function( response ) {
            console.log(response)
			$("#editModal").modal('show');
			$("#id_level_user").val(response['id_level_user']);
			$("#nama_level_user_edit").val(response['nama_level_user']);
		}
	);
}
function del(id){
	if(confirm('Yakin menghapus data ?')){
		$.ajax({
				url :"<?php echo site_url();?>level_user/hapus_level_user/"+id,
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
				<h4 class="modal-title" id="myModalLabel">Tambah Data Hak Akses</h4>
            </div>
			<div class="modal-body">
			<form class="form-horizontal form-label-left" id="form" name="form">
				<div class="form-group">
                    <label class="control-label col-sm-3 col-sm-3 col-xs-12">Nama Hak Akses</label>
                    <div class="col-md-12 col-sm-12 col-xs-12">
                        <input type="text" class="form-control" id="nama_level_user" name="nama_level_user" placeholder="Nama Hak Akses" />
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
				<h4 class="modal-title" id="myModalLabel">Edit Data Hak Akses</h4>
            </div>
			<div class="modal-body">
			<form class="form-horizontal form-label-left" id="form2" name="form2">
					
				<div class="form-group">
                    <label class="control-label col-sm-3 col-sm-3 col-xs-12">Nama Hak Akses</label>
                    <div class="col-md-12 col-sm-12 col-xs-12">
                        <input type="text" class="form-control" id="nama_level_user_edit" name="nama_level_user" placeholder="Nama Hak Akses" />
                        <input type="hidden" name="id_level_user" id="id_level_user">
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