<div class="content-wrapper">
    <section class="content">
        <div class="box box-warning box-solid">
            <div class="box-header with-border">
                <h3 class="box-title">PENDAFTARAN MEREK - <?= strtoupper($button)?></h3>
            </div>
            <form action="<?php echo $action;?>" method="post" enctype="multipart/form-data">
                <table class='table table-bordered'>
                    <tr>
                        <td>Tanggal</td>
                        <td><?php echo $tanggal;?></td>
                    </tr>
                    <tr>
                        <td>Nama Usaha</td>
                        <td><?php echo $nama_usaha;?></td>
                    </tr>
                    <tr>
                        <td>Alamat</td>
                        <td><?php echo $alamat;?></td>
                    </tr>
                    <tr>
                        <td>Nama Owner</td>
                        <td><?php echo $nama_owner;?></td>
                    </tr>
                    <tr>
                        <td>Logo</td>
                        <td>
                            <?php if ($logo):?>
                                <img src="<?php echo base_url('./uploads/'. $logo);?>" alt="Logo" style="max-width: 200px; max-height: 200px;">
                            <?php else:?>
                                No Logo Available
                            <?php endif;?>
                        </td>
                    </tr>
                    <tr>
                        <td>Surat</td>
                        <td>
                            <?php if ($surat):?>
                                <?php 
                                    $file_path = './uploads/'. $surat;
                                    if (file_exists($file_path)) {
                                        echo '<embed src="'. base_url($file_path). '" type="application/pdf" width="100%" height="600px" />';
                                    } else {
                                        echo 'Surat tidak ditemukan.';
                                    }
                               ?>
                            <?php else:?>
                                No file available.
                            <?php endif;?>
                        </td>
                    </tr>
                    <tr>
                        <td>Tanda Tangan</td>
                        <td>
                            <?php if ($ttd):?>
                                <img src="<?php echo base_url('./uploads/'. $ttd);?>" alt="Tanda Tangan" style="max-width: 200px; max-height: 200px;">
                            <?php else:?>
                                No Tanda Tangan Available
                            <?php endif;?>
                        </td>
                    </tr>
                    <!-- <tr>
                        <td>Status</td>
                        <td><?php echo $status;?></td>
                    </tr> -->

                    <tr><td width='200'>Status <?php echo form_error('status')?></td><td>
					                            <?php echo form_dropdown('status', array(1 => 'DISETUJUI',
																		 				2 => 'PERLU REVISI',
																						3 => 'DITOLAK',
																						0 => 'DIAJUKAN'), $status, array('class' => 'form-control', 'name' => 'status', 'id' => 'status'));?>
					
                    <tr>
                        <td>Notes</td>
                        <td><textarea class="form-control" name="notes" id="notes" placeholder="Notes"><?php echo $notes;?></textarea></td>
                    </tr>
                    <tr>
                        <td></td>
                        <td>
                            <input type="hidden" name="id_permohonan" value="<?php echo $id_permohonan;?>" /> 
                            <button type="submit" class="btn btn-danger"><i class="fa fa-floppy-o"></i> <?php echo $button?></button> 
                            <a href="<?php echo site_url('admin')?>" class="btn btn-info"><i class="fa fa-sign-out"></i> Kembali</a>
                        </td>
                    </tr>
                </table>
            </form>
        </div>
    </section>
</div>
