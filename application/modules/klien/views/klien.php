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
                    <th>Nama</th>
                    <th>Kontak</th>
                    <th>Telepon</th>
                    <th>Alamat</th>
                    <th>Aksi</th>
                  </tr>
                </thead>
                <tbody>
                	<?php $no=1;
                        foreach($datatables->result() as $row){
                            echo "<tr>";
                            echo "<td>".$no."</td>";
                            echo "<td>".$row->nama_klien."</td>";
                            echo "<td>".$row->kontak_klien."</td>";
                            echo "<td>".$row->telepon_klien."</td>";
                            echo "<td>".$row->alamat_klien."</td>";
                            echo "<td>
                            <button type='button' class='btn btn-outline-warning btn-xs' onClick='edit(".$row->id_klien.")' ><i class='icon-pencil'></i></button>
                            <button type='button' class='btn btn-outline-danger btn-xs' onClick=del('".$row->id_klien."') ><i class='icon-trash'></i></button>
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
				url :"<?php echo site_url();?>klien/tambah_klien",
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
				url :"<?php echo site_url();?>klien/edit_klien",
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
	$.getJSON('<?php echo site_url();?>klien/edit_data_klien/'+id,
		function( response ) {
			$("#editModal").modal('show');
			$("#id_klien").val(response['id_klien']);
			$("#klien").val(response['nama_klien']);
			$("#kontak").val(response['kontak_klien']);
			$("#telepon").val(response['telepon_klien']);
			$("#alamat").val(response['alamat_klien']);
		}
	);
}
function del(id){
	if(confirm('Yakin menghapus data ?')){
		$.ajax({
				url :"<?php echo site_url();?>klien/hapus_klien/"+id,
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
				<h4 class="modal-title" id="myModalLabel">Tambah Data Klien</h4>
            </div>
			<div class="modal-body">
			<form class="form-horizontal form-label-left" id="form" name="form">
				<div class="form-group">
                    <label class="control-label col-sm-3 col-sm-3 col-xs-12">Nama Klien</label>
                    <div class="col-md-12 col-sm-12 col-xs-12">
                        <input type="text" class="form-control" id="nama_klien" name="nama_klien" placeholder="Nama Klien" />
                    </div>
                </div>
                <div class="clearfix"></div>
                <div class="row">
                	<div class="col-md-6">
                		<div class="form-group">
                    		<label class="control-label col-sm-12 col-sm-12 col-xs-12">Kontak Klien</label>
                    		<div class="col-md-12 col-sm-12 col-xs-12">
                        		<input type="text" class="form-control" id="kontak_klien" name="kontak_klien" placeholder="Kontak Klien" />
                    		</div>
                		</div>	
                	</div>
                	<div class="col-md-6">
                		<div class="form-group">
                    		<label class="control-label col-sm-12 col-sm-12 col-xs-12">Telepon Klien</label>
                    		<div class="col-md-12 col-sm-12 col-xs-12">
                        		<input type="text" class="form-control" id="telepon_klien" name="telepon_klien" placeholder="Telepon Klien" />
                   	 		</div>
                		</div>	
                	</div>
                </div>
                <div class="clearfix"></div>
                <div class="form-group">
                    <label class="control-label col-sm-3 col-sm-3 col-xs-12">Alamat Klien</label>
                    <div class="col-md-12 col-sm-12 col-xs-12">
                        <input type="text" class="form-control" id="alamat_klien" name="alamat_klien" placeholder="Alamat Klien" />
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
				<h4 class="modal-title" id="myModalLabel">Edit Data Klien</h4>
            </div>
			<div class="modal-body">
			<form class="form-horizontal form-label-left" id="form2" name="form2">
					
				<div class="form-group">
                    <label class="control-label col-sm-3 col-sm-3 col-xs-12">Nama Klien</label>
                    <div class="col-md-12 col-sm-12 col-xs-12">
                    	<input type="hidden" class="form-control" id="id_klien" name="id_klien" />
                        <input type="text" class="form-control" id="klien" name="klien" placeholder="Klien" />
                    </div>
                </div>
                <div class="clearfix"></div>
                <div class="row">
                    <div class="col-md-6">
                        <div class="form-group">
                            <label class="control-label col-sm-12 col-sm-12 col-xs-12">Kontak Klien</label>
                            <div class="col-md-12 col-sm-12 col-xs-12">
                                <input type="text" class="form-control" id="kontak" name="kontak" placeholder="Kontak Klien" />
                            </div>
                        </div>  
                    </div>
                    <div class="col-md-6">
                        <div class="form-group">
                            <label class="control-label col-sm-12 col-sm-12 col-xs-12">Telepon Klien</label>
                            <div class="col-md-12 col-sm-12 col-xs-12">
                                <input type="text" class="form-control" id="telepon" name="telepon" placeholder="Telepon Klien" />
                            </div>
                        </div>  
                    </div>
                </div>
                <div class="clearfix"></div>
                <div class="form-group">
                    <label class="control-label col-sm-3 col-sm-3 col-xs-12">Alamat Klien</label>
                    <div class="col-md-12 col-sm-12 col-xs-12">
                        <input type="text" class="form-control" id="alamat" name="alamat" placeholder="Alamat Klien" />
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