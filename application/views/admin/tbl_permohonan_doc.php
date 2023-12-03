<!doctype html>
<html>
    <head>
        <title>harviacode.com - codeigniter crud generator</title>
        <link rel="stylesheet" href="<?php echo base_url('assets/bootstrap/css/bootstrap.min.css') ?>"/>
        <style>
            .word-table {
                border:1px solid black !important; 
                border-collapse: collapse !important;
                width: 100%;
            }
            .word-table tr th, .word-table tr td{
                border:1px solid black !important; 
                padding: 5px 10px;
            }
        </style>
    </head>
    <body>
        <h2>Tbl_permohonan List</h2>
        <table class="word-table" style="margin-bottom: 10px">
            <tr>
                <th>No</th>
		<th>Tanggal</th>
		<th>Nama Usaha</th>
		<th>Alamat</th>
		<th>Nama Owner</th>
		<th>Logo</th>
		<th>Surat</th>
		<th>Ttd</th>
		<th>Id User</th>
		<th>Status</th>
		
            </tr><?php
            foreach ($permohonan_data as $permohonan)
            {
                ?>
                <tr>
		      <td><?php echo ++$start ?></td>
		      <td><?php echo $permohonan->tanggal ?></td>
		      <td><?php echo $permohonan->nama_usaha ?></td>
		      <td><?php echo $permohonan->alamat ?></td>
		      <td><?php echo $permohonan->nama_owner ?></td>
		      <td><?php echo $permohonan->logo ?></td>
		      <td><?php echo $permohonan->surat ?></td>
		      <td><?php echo $permohonan->ttd ?></td>
		      <td><?php echo $permohonan->id_user ?></td>
		      <td><?php echo $permohonan->status ?></td>	
                </tr>
                <?php
            }
            ?>
        </table>
    </body>
</html>