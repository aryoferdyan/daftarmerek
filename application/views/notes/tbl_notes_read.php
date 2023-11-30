
<div class="content-wrapper">
	
	<section class="content">
		<div class="box box-warning box-solid">
			<div class="box-header with-border">
				<h3 class="box-title">DETAIL DATA TBL_NOTES</h3>
			</div>
		
		<table class='table table-bordered'>        

	
			<tr>
				<td>Id Permohonan</td>
				<td><?php echo $id_permohonan; ?></td>
			</tr>
	
			<tr>
				<td>Tgl Notes</td>
				<td><?php echo $tgl_notes; ?></td>
			</tr>
	
			<tr>
				<td>Isi Notes</td>
				<td><?php echo $isi_notes; ?></td>
			</tr>
	
			<tr>
				<td></td>
				<td><a href="<?php echo site_url('notes') ?>" class="btn btn-default">Kembali</a></td>
			</tr>
	
		</table>
		</div>
	</section>
</div>