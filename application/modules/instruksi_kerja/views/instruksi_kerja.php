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
                    <th>Nama Instruksi Kerja</th>
                    <th>File Referensi</th>
                    <th>Aksi</th>
                  </tr>
                </thead>
                <tbody>
                	<?php $no=1;
                        foreach($datatables->result() as $row){
                            echo "<tr>";
                            echo "<td>".$no."</td>";
                            echo "<td>".$row->nama_instruksi_kerja."</td>";
                            echo "<td>".$row->file_instruksi_kerja."</td>";
                            echo "<td>
                            <button type='button' class='btn btn-outline-warning btn-xs' onClick='edit(".$row->id_instruksi_kerja.")' ><i class='icon-pencil'></i></button>
                            <button type='button' class='btn btn-outline-danger btn-xs' onClick=del('".$row->id_instruksi_kerja."') ><i class='icon-trash'></i></button>
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
        $('#submit').submit(function(e){
            e.preventDefault(); 
                 $.ajax({
                    url:'<?php echo base_url();?>instruksi_kerja/tambah_instruksi_kerja',
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
                    url:'<?php echo base_url();?>instruksi_kerja/edit_instruksi_kerja',
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
	$.getJSON('<?php echo site_url();?>instruksi_kerja/edit_data_instruksi_kerja/'+id,
		function( response ) {
            console.log(response)
			$("#editModal").modal('show');
			$("#id_instruksi_kerja").val(response['id_instruksi_kerja']);
			$("#nama_instruksi_kerja_edit").val(response['nama_instruksi_kerja']);
			$("#nama_file_referensi").val(response['file_instruksi_kerja']);
		}
	);
}
function del(id){
	if(confirm('Yakin menghapus data ?')){
		$.ajax({
				url :"<?php echo site_url();?>instruksi_kerja/hapus_instruksi_kerja/"+id,
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
				<h4 class="modal-title" id="myModalLabel">Tambah Data Instruksi Kerja</h4>
            </div>
			<form class="form-horizontal" id="submit">
                <div class="modal-body">
                    <div class="form-group">
                        <label class="control-label col-sm-12 col-sm-12 col-xs-12">Nama Instruksi Kerja</label>
                        <input type="text" name="nama_instruksi_kerja" id="nama_instruksi_kerja" class="form-control" placeholder="Nama Instruksi Kerja">
                    </div>
                    <div class="form-group">
                        <label class="control-label col-sm-12 col-sm-12 col-xs-12">File Referensi</label>
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
				<h4 class="modal-title" id="myModalLabel">Edit Data Instruksi Kerja</h4>
            </div>
            <form class="form-horizontal form-label-left" id="form2" name="form2">
			    <div class="modal-body">
                    <div class="form-group">
                        <label class="control-label col-sm-3 col-sm-3 col-xs-12">Nama Instruksi Kerja</label>
                        <div class="col-md-12 col-sm-12 col-xs-12">
                            <input type="text" class="form-control" id="nama_instruksi_kerja_edit" name="nama_instruksi_kerja" placeholder="Nama Instruksi Kerja" />
                            <input type="hidden" name="id_instruksi_kerja" id="id_instruksi_kerja">
                            <input type="hidden" name="nama_file_referensi" id="nama_file_referensi">
                        </div>
                    </div>
                    <div class="form-group">
                        <label class="control-label col-sm-3 col-sm-3 col-xs-12">File Referensi</label>
                        <div class="col-md-12 col-sm-12 col-xs-12">
                            <input type="file" class="form-control" id="file" name="file" />
                        </div>
                    </div>
			
                </div>
                <div class="modal-footer">
				    <button type="button" class="btn btn-default" data-dismiss="modal"><i class="icon-close"></i> <span>Tutup</span></button>
                    <button type="submit" class="btn btn-primary" id="saveEdit"><i class="icon-check"></i> <span>Simpan</span></button>
                </div>
            </form>
		</div>
	</div>
</div>