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
                    <th>Kelompok Jenis Uji</th>
                    <th>Nama Lengkap</th>
                    <th>Nama Singkat</th>
                    <th>Rumus</th>
                    <th>Hasil</th>
                    <th>Satuan</th>
                    <th>Ref. Method</th>
                    <th>Aksi</th>
                  </tr>
                </thead>
                <tbody>
                	<?php $no=1;
                        foreach($datatables->result() as $row){
                            echo "<tr>";
                            echo "<td>".$no."</td>";
                            echo "<td>".$row->id_kelompok_jenis_uji."</td>";
                            echo "<td>".$row->nama_lengkap."</td>";
                            echo "<td>".$row->nama_singkat."</td>";
                            echo "<td>".$row->rumus."</td>";
                            echo "<td>".$row->hasil."</td>";
                            echo "<td>".$row->satuan."</td>";
                            echo "<td>".$row->ref_method."</td>";
                            echo "<td>
                            <button type='button' class='btn btn-outline-warning btn-xs' onClick='edit(".$row->id_jenis_uji.")' ><i class='icon-pencil'></i></button>
                            <button type='button' class='btn btn-outline-danger btn-xs' onClick=del('".$row->id_jenis_uji."') ><i class='icon-trash'></i></button>
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
				url :"<?php echo site_url();?>jenis_uji/tambah_jenis_uji",
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
				url :"<?php echo site_url();?>jenis_uji/edit_jenis_uji",
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
	$.getJSON('<?php echo site_url();?>jenis_uji/edit_data_jenis_uji/'+id,
		function( response ) {
            console.log(response)
			$("#editModal").modal('show');
			$("#id_jenis_uji").val(response['id_jenis_uji']);
			$("#kelompok_jenis_uji_edit").val(response['id_kelompok_jenis_uji']);
			$("#nama_lengkap_edit").val(response['nama_lengkap']);
			$("#nama_singkat_edit").val(response['nama_singkat']);
			$("#rumus_edit").val(response['rumus']);
            $("#satuan_edit").val(response['satuan']);
            $("#hasil_edit").val(response['hasil']);
            $("#ref_method_edit").val(response['ref_method']);
		}
	);
}
function del(id){
	if(confirm('Yakin menghapus data ?')){
		$.ajax({
				url :"<?php echo site_url();?>jenis_uji/hapus_jenis_uji/"+id,
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
				<h4 class="modal-title" id="myModalLabel">Tambah Data Jenis Uji</h4>
            </div>
			<div class="modal-body">
			<form class="form-horizontal form-label-left" id="form" name="form">
				<div class="form-group">
                    <label class="control-label col-sm-3 col-sm-3 col-xs-12">Kelompok Jenis Uji</label>
                    <div class="col-md-12 col-sm-12 col-xs-12">
                        <input type="text" class="form-control" id="kelompok_jenis_uji" name="kelompok_jenis_uji" placeholder="Kelompok Jenis Uji" />
                    </div>
                </div>
                <div class="clearfix"></div>
                <div class="row">
                	<div class="col-md-6">
                		<div class="form-group">
                    		<label class="control-label col-sm-12 col-sm-12 col-xs-12">Nama Lengkap</label>
                    		<div class="col-md-12 col-sm-12 col-xs-12">
                        		<input type="text" class="form-control" id="nama_lengkap" name="nama_lengkap" placeholder="Nama Lengkap" />
                    		</div>
                		</div>	
                	</div>
                	<div class="col-md-6">
                		<div class="form-group">
                    		<label class="control-label col-sm-12 col-sm-12 col-xs-12">Nama Singkat</label>
                    		<div class="col-md-12 col-sm-12 col-xs-12">
                        		<input type="text" class="form-control" id="nama_singkat" name="nama_singkat" placeholder="Nama Singkat" />
                   	 		</div>
                		</div>	
                	</div>
                </div>
                <div class="row">
                    <div class="col-md-6">
                        <div class="form-group">
                            <label class="control-label col-sm-12 col-sm-12 col-xs-12">Rumus</label>
                            <div class="col-md-12 col-sm-12 col-xs-12">
                                <input type="text" class="form-control" id="rumus" name="rumus" placeholder="Rumus" />
                            </div>
                        </div>  
                    </div>
                    <div class="col-md-6">
                        <div class="form-group">
                            <label class="control-label col-sm-12 col-sm-12 col-xs-12">Hasil</label>
                            <div class="col-md-12 col-sm-12 col-xs-12">
                                <input type="text" class="form-control" id="hasil" name="hasil" placeholder="hasil" />
                            </div>
                        </div>  
                    </div>
                </div>
                <div class="clearfix"></div>
                <div class="form-group">
                    <label class="control-label col-sm-3 col-sm-3 col-xs-12">Satuan</label>
                    <div class="col-md-12 col-sm-12 col-xs-12">
                        <input type="text" class="form-control" id="satuan" name="satuan" placeholder="Satuan" />
                    </div>
                </div>
                <div class="clearfix"></div>
                <div class="form-group">
                    <label class="control-label col-sm-3 col-sm-3 col-xs-12">Ref Method</label>
                    <div class="col-md-12 col-sm-12 col-xs-12">
                        <input type="text" class="form-control" id="ref_method" name="ref_method" placeholder="Ref Method" />
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
                    <label class="control-label col-sm-3 col-sm-3 col-xs-12">Kelompok Jenis Uji</label>
                    <div class="col-md-12 col-sm-12 col-xs-12">
                        <input type="text" class="form-control" id="kelompok_jenis_uji_edit" name="kelompok_jenis_uji" placeholder="Kelompok Jenis Uji" />
                        <input type="hidden" name="id_jenis_uji" id="id_jenis_uji">
                    </div>
                </div>
                <div class="clearfix"></div>
                <div class="row">
                    <div class="col-md-6">
                        <div class="form-group">
                            <label class="control-label col-sm-12 col-sm-12 col-xs-12">Nama Lengkap</label>
                            <div class="col-md-12 col-sm-12 col-xs-12">
                                <input type="text" class="form-control" id="nama_lengkap_edit" name="nama_lengkap" placeholder="Nama Lengkap" />
                            </div>
                        </div>  
                    </div>
                    <div class="col-md-6">
                        <div class="form-group">
                            <label class="control-label col-sm-12 col-sm-12 col-xs-12">Nama Singkat</label>
                            <div class="col-md-12 col-sm-12 col-xs-12">
                                <input type="text" class="form-control" id="nama_singkat_edit" name="nama_singkat" placeholder="Nama Singkat" />
                            </div>
                        </div>  
                    </div>
                </div>
                <div class="row">
                    <div class="col-md-6">
                        <div class="form-group">
                            <label class="control-label col-sm-12 col-sm-12 col-xs-12">Rumus</label>
                            <div class="col-md-12 col-sm-12 col-xs-12">
                                <input type="text" class="form-control" id="rumus_edit" name="rumus" placeholder="Rumus" />
                            </div>
                        </div>  
                    </div>
                    <div class="col-md-6">
                        <div class="form-group">
                            <label class="control-label col-sm-12 col-sm-12 col-xs-12">Hasil</label>
                            <div class="col-md-12 col-sm-12 col-xs-12">
                                <input type="text" class="form-control" id="hasil_edit" name="hasil" placeholder="hasil" />
                            </div>
                        </div>  
                    </div>
                </div>
                <div class="clearfix"></div>
                <div class="form-group">
                    <label class="control-label col-sm-3 col-sm-3 col-xs-12">Satuan</label>
                    <div class="col-md-12 col-sm-12 col-xs-12">
                        <input type="text" class="form-control" id="satuan_edit" name="satuan" placeholder="Satuan" />
                    </div>
                </div>
                <div class="clearfix"></div>
                <div class="form-group">
                    <label class="control-label col-sm-3 col-sm-3 col-xs-12">Ref Method</label>
                    <div class="col-md-12 col-sm-12 col-xs-12">
                        <input type="text" class="form-control" id="ref_method_edit" name="ref_method" placeholder="Ref Method" />
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