<div class="content-wrapper">
	<section class="content">
		<div class="box box-warning box-solid">
			<div class="box-header with-border">
				<h3 class="box-title"><?php echo strtoupper($button) ?> DATA TBL_PENGUMUMAN</h3>
			</div>
			<form action="<?php echo $action; ?>" method="post">
			
				<table class='table table-bordered'>
	
					<tr>
						<td width='200'>Tgl Pengumuman <?php echo form_error('tgl_pengumuman') ?></td>
						<td><input type="date" class="form-control" name="tgl_pengumuman" id="tgl_pengumuman" placeholder="Tgl Pengumuman" value="<?php echo $tgl_pengumuman; ?>" /></td>
					</tr>
	
					<tr>
						<td width='200'>Isi Pengumuman <?php echo form_error('isi_pengumuman') ?></td><td><input type="text" class="form-control" name="isi_pengumuman" id="isi_pengumuman" placeholder="Isi Pengumuman" value="<?php echo $isi_pengumuman; ?>" /></td>
					</tr>
	
					<tr>
						<td width='200'>Id User <?php echo form_error('id_user') ?></td><td><input type="text" class="form-control" name="id_user" id="id_user" placeholder="Id User" value="<?php echo $id_user; ?>" /></td>
					</tr>
	
					<tr>
						<td></td>
						<td>
							<input type="hidden" name="id_pengumuman" value="<?php echo $id_pengumuman; ?>" /> 
							<button type="submit" class="btn btn-danger"><i class="fa fa-floppy-o"></i> <?php echo $button ?></button> 
							<a href="<?php echo site_url('pengumuman') ?>" class="btn btn-info"><i class="fa fa-sign-out"></i> Kembali</a>
						</td>
					</tr>
	
				</table>
			</form>
		</div>
	</section>
</div>