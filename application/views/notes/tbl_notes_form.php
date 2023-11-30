<div class="content-wrapper">
	<section class="content">
		<div class="box box-warning box-solid">
			<div class="box-header with-border">
				<h3 class="box-title"><?php echo strtoupper($button) ?> DATA TBL_NOTES</h3>
			</div>
			<form action="<?php echo $action; ?>" method="post">
			
				<table class='table table-bordered'>
	
					<tr>
						<td width='200'>Id Permohonan <?php echo form_error('id_permohonan') ?></td><td><input type="text" class="form-control" name="id_permohonan" id="id_permohonan" placeholder="Id Permohonan" value="<?php echo $id_permohonan; ?>" /></td>
					</tr>
	
					<tr>
						<td width='200'>Tgl Notes <?php echo form_error('tgl_notes') ?></td>
						<td><input type="date" class="form-control" name="tgl_notes" id="tgl_notes" placeholder="Tgl Notes" value="<?php echo $tgl_notes; ?>" /></td>
					</tr>
	
					<tr>
						<td width='200'>Isi Notes <?php echo form_error('isi_notes') ?></td><td><input type="text" class="form-control" name="isi_notes" id="isi_notes" placeholder="Isi Notes" value="<?php echo $isi_notes; ?>" /></td>
					</tr>
	
					<tr>
						<td></td>
						<td>
							<input type="hidden" name="id_notes" value="<?php echo $id_notes; ?>" /> 
							<button type="submit" class="btn btn-danger"><i class="fa fa-floppy-o"></i> <?php echo $button ?></button> 
							<a href="<?php echo site_url('notes') ?>" class="btn btn-info"><i class="fa fa-sign-out"></i> Kembali</a>
						</td>
					</tr>
	
				</table>
			</form>
		</div>
	</section>
</div>