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
                    <th>Nama Bahan</th>
                    <th>Nama Kimia</th>
                    <th>Katalog</th>
                    <th>Jumlah</th>
                    <th>Satuan</th>
                    <th>File Referensi</th>
                    <th>Aksi</th>
                  </tr>
                </thead>
                <tbody>
                	
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
        $('#submit').submit(function(e){
            e.preventDefault(); 
                 $.ajax({
                    url:'<?php echo base_url();?>gudang/tambah_gudang',
                    type:"post",
                    data:new FormData(this), //this is formData
                    processData:false,
                    contentType:false,
                    cache:false,
                    async:false,
                    success: function(data){
                        $('#addModal').modal('hide');
                        location.reload();
                   }
                 });
        });
        $('#form2').submit(function(e){
            e.preventDefault(); 
                 $.ajax({
                    url:'<?php echo base_url();?>gudang/edit_gudang',
                    type:"post",
                    data:new FormData(this), //this is formData
                    processData:false,
                    contentType:false,
                    cache:false,
                    async:false,
                    success: function(data){
                        $('#addModal').modal('hide');
                        location.reload();
                   }
                 });
        });
	});
function edit(id){
	$.getJSON('<?php echo site_url();?>gudang/edit_data_gudang/'+id,
		function( response ) {
            console.log(response)
			$("#editModal").modal('show');
			$("#id_gudang").val(response['id_gudang']);
			$("#nama_bahan_kimia_edit").val(response['nama_bahan']);
			$("#nama_kimia_edit").val(response['nama_kimia']);
            $("#katalog_edit").val(response['katalog']);
            $("#jumlah_edit").val(response['jumlah']);
            $("#file_gudang").val(response['file_bahan_kimia']);
		}
	);
}
function del(id){
	if(confirm('Yakin menghapus data ?')){
		$.ajax({
				url :"<?php echo site_url();?>gudang/hapus_gudang/"+id,
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
				<h4 class="modal-title" id="myModalLabel">Tambah Data Bahan Kimia</h4>
            </div>
			<form class="form-horizontal" id="submit">
                <div class="modal-body">
                    <div class="form-group">
                        <label class="control-label col-sm-12 col-sm-12 col-xs-12">Nama Bahan Kimia</label>
                        <input type="text" name="nama_bahan" id="nama_bahan" class="form-control" placeholder="Nama Bahan Kimia">
                    </div>
                    <div class="form-group">
                        <label class="control-label col-sm-12 col-sm-12 col-xs-12">Nama Kimia</label>
                        <input type="text" name="nama_kimia" id="nama_kimia" class="form-control" placeholder="Nama Kimia">
                    </div>
                    <div class="form-group">
                        <label class="control-label col-sm-12 col-sm-12 col-xs-12">No Katalog / CAS System</label>
                        <input type="text" name="katalog" id="katalog" class="form-control" placeholder="No Katalog">
                    </div>
                    <div class="form-group">
                        <label class="control-label col-sm-12 col-sm-12 col-xs-12">Satuan</label>
                        <input type="text" name="jumlah" id="jumlah" class="form-control" placeholder="Satuan">
                    </div>
                    <div class="form-group">
                        <label class="control-label col-sm-12 col-xs-12"> File Referensi</label>
                        <input type="file" name="file" class="form-control">
                    </div>
                </div>
                <div class="modal-footer">
				    <button type="button" class="btn btn-default" data-dismiss="modal"><i class="icon-close"></i> <span>Tutup</span></button>
                    <button type="submit" class="btn btn-primary" id="save"><i class="icon-check"></i> <span>Simpan</span></button>
                </div>
            </form>
		</div>
	</div>
</div>
<div class="modal fade bs-example-modal-lg" id="editModal" tabindex="-1" role="dialog" aria-hidden="true">
	<div class="modal-dialog modal-lg">
		<div class="modal-content">

			<div class="modal-header">
				<h4 class="modal-title" id="myModalLabel">Edit Data Bahan Kimia</h4>
            </div>
            <form class="form-horizontal" id="submit2">
                <div class="modal-body">
                    <div class="form-group">
                        <label class="control-label col-sm-12 col-sm-12 col-xs-12">Nama Bahan Kimia</label>
                        <input type="text" name="nama_kimia" id="nama_bahan_kimia_edit" class="form-control" placeholder="Nama Bahan Kimia">
                        <input type="hidden" name="id_gudang" id="id_gudang">
                        <input type="hidden" name="file_gudang" id="file_gudang">
                    </div>
                    <div class="form-group">
                        <label class="control-label col-sm-12 col-sm-12 col-xs-12">Nama Kimia</label>
                        <input type="text" name="nama_kimia" id="nama_kimia_edit" class="form-control" placeholder="Nama Kimia">
                    </div>
                    <div class="form-group">
                        <label class="control-label col-sm-12 col-sm-12 col-xs-12">No Katalog / CAS System</label>
                        <input type="text" name="katalog" id="katalog_edit" class="form-control" placeholder="No Katalog">
                    </div>
                    <div class="form-group">
                        <label class="control-label col-sm-12 col-sm-12 col-xs-12">Satuan</label>
                        <input type="text" name="jumlah" id="jumlah_edit" class="form-control" placeholder="Satuan">
                    </div>
                    <div class="form-group">
                        <label class="control-label col-sm-12 col-xs-12"> File Referensi</label>
                        <input type="file" name="file" class="form-control">
                    </div>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-default" data-dismiss="modal"><i class="icon-close"></i> <span>Tutup</span></button>
                    <button type="submit" class="btn btn-primary" id="save"><i class="icon-check"></i> <span>Simpan</span></button>
                </div>
            </form>
		</div>
	</div>
</div>