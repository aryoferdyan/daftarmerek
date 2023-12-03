
<div class="content-wrapper">
	
	<section class="content">
		<div class="box box-warning box-solid">
			<div class="box-header with-border">
				<h3 class="box-title">DETAIL PERMOHONAN MEREK</h3>
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
                    <td>
                        <?php if ($logo): ?>
                            <img src="<?php echo base_url('./uploads/' . $logo); ?>" alt="Logo" style="max-width: 200px; max-height: 200px;">
                        <?php else: ?>
                            No Logo Available
                        <?php endif; ?>
                    </td>
                </tr>

                <tr>
                    <td>Surat</td>
                    <td>
                        <?php if ($surat): ?>
                            <a class="btn btn-primary btn-sm" href="<?php echo base_url('./uploads/' . $surat); ?>" target="_blank">Lihat Surat</a>
                        <?php else: ?>
                            No Surat Available
                        <?php endif; ?>
                    </td>
                </tr>

                <tr>
                    <td>Ttd</td>
                    <td>
						<?php if ($logo): ?>
                            <img src="<?php echo base_url('./uploads/' . $ttd); ?>" alt="Tanda Tangan" style="max-width: 200px; max-height: 200px;">
                        <?php else: ?>
                            No Logo Available
                        <?php endif; ?>
                    </td>
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
                    <td></td>
                    <td><a href="<?php echo site_url('permohonan') ?>" class="btn btn-danger btn-sm">Kembali</a></td>
                </tr>

				</table>
		</div>
	</section>
</div>
           
