<div class="content-wrapper">
	<section class="content">
		<div class="box box-warning box-solid">
			<div class="box-header with-border">
				<h3 class="box-title"><?php echo strtoupper($button) ?> DATA TBL_PERMOHONAN</h3>
			</div>
			<form action="<?php echo $action; ?>" method="post" enctype="multipart/form-data">
			
				<table class='table table-bordered'>
	
					<tr>
						<td width='200'>Tanggal <?php echo form_error('tanggal') ?></td>
						<td><input type="date" class="form-control" name="tanggal" id="tanggal" placeholder="Tanggal" value="<?php echo $tanggal; ?>" /></td>
					</tr>
	
					<tr>
						<td width='200'>Nama Usaha <?php echo form_error('nama_usaha') ?></td><td><input type="text" class="form-control" name="nama_usaha" id="nama_usaha" placeholder="Nama Usaha" value="<?php echo $nama_usaha; ?>" /></td>
					</tr>
	
					<tr>
						<td width='200'>Alamat <?php echo form_error('alamat') ?></td><td><input type="text" class="form-control" name="alamat" id="alamat" placeholder="Alamat" value="<?php echo $alamat; ?>" /></td>
					</tr>
	
					<tr>
						<td width='200'>Nama Owner <?php echo form_error('nama_owner') ?></td><td><input type="text" class="form-control" name="nama_owner" id="nama_owner" placeholder="Nama Owner" value="<?php echo $nama_owner; ?>" /></td>
					</tr>
	
					<tr>
						<td width='200'>Logo <?php echo form_error('logo') ?></td><td><input type="file" class="form-control" name="logo" id="logo" value="<?php echo $logo; ?>" /></td>
					</tr>

					<tr>
						<td width='200'>Surat <?php echo form_error('surat') ?></td><td><input type="file" class="form-control" name="surat" id="surat" value="<?php echo $surat; ?>" /></td>
					</tr>

					<tr>
						<td width='200'>Ttd <?php echo form_error('ttd') ?></td><td><input type="file" class="form-control" name="ttd" id="ttd" value="<?php echo $ttd; ?>" /></td>
					</tr>
	
					<tr>
						<td width='200'>Id User <?php echo form_error('id_user');  ?></td><td><input type="text" class="form-control" name="id_user" id="id_user" placeholder="Id User" value="<?php echo $this->session->userdata('id_users'); ?>" /></td>
					</tr>
	
					<tr>
						<td width='200'>Status <?php echo form_error('status') ?></td><td><input type="text" class="form-control" name="status" id="status" placeholder="Status" value="<?php echo $status; ?>" /></td>
					</tr>
	
					<tr>
						<td></td>
						<td>
							<input type="hidden" name="id_permohonan" value="<?php echo $id_permohonan; ?>" /> 
							<button type="submit" class="btn btn-danger"><i class="fa fa-floppy-o"></i> <?php echo $button ?></button> 
							<a href="<?php echo site_url('permohonan') ?>" class="btn btn-info"><i class="fa fa-sign-out"></i> Kembali</a>
						</td>
					</tr>
	
				</table>
			</form>
		</div>
	</section>
</div>