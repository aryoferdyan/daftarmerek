
<div class="content-wrapper">
	
	<section class="content">
		<div class="box box-warning box-solid">
			<div class="box-header with-border">
				<h3 class="box-title">DETAIL DATA TBL_PENGUMUMAN</h3>
			</div>
		
		<table class='table table-bordered'>        

	
			<tr>
				<td>Tgl Pengumuman</td>
				<td><?php echo $tgl_pengumuman; ?></td>
			</tr>
	
			<tr>
				<td>Isi Pengumuman</td>
				<td><?php echo $isi_pengumuman; ?></td>
			</tr>
	
			<tr>
				<td>Id User</td>
				<td><?php echo $id_user; ?></td>
			</tr>
	
			<tr>
				<td></td>
				<td><a href="<?php echo site_url('pengumuman') ?>" class="btn btn-default">Kembali</a></td>
			</tr>
	
		</table>
		</div>
	</section>
</div>