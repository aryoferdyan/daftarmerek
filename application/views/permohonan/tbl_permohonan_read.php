
<div class="content-wrapper">
	
	<section class="content">
		<div class="box box-warning box-solid">
			<div class="box-header with-border">
				<h3 class="box-title">DETAIL DATA TBL_PERMOHONAN</h3>
			</div>
		
		<table class='table table-bordered'>        

	
			<tr>
				<td>Tanggal</td>
				<td><?php echo $tanggal; ?></td>
			</tr>
	
			<tr>
				<td>Nama Usaha</td>
				<td><?php echo $nama_usaha; ?></td>
			</tr>
	
			<tr>
				<td>Alamat</td>
				<td><?php echo $alamat; ?></td>
			</tr>
	
			<tr>
				<td>Nama Owner</td>
				<td><?php echo $nama_owner; ?></td>
			</tr>
	
			<tr>
				<td>Logo</td>
				<td><?php echo $logo; ?></td>
			</tr>
	
			<tr>
				<td>Surat</td>
				<td><?php echo $surat; ?></td>
			</tr>
	
			<tr>
				<td>Ttd</td>
				<td><?php echo $ttd; ?></td>
			</tr>
	
			<tr>
				<td>Id User</td>
				<td><?php echo $id_user; ?></td>
			</tr>
	
			<tr>
				<td>Status</td>
				<td><?php echo $status; ?></td>
			</tr>
	
			<tr>
				<td></td>
				<td><a href="<?php echo site_url('permohonan') ?>" class="btn btn-default">Kembali</a></td>
			</tr>
	
		</table>
		</div>
	</section>
</div>