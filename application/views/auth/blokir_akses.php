<html>
    <head>
        <title>Blokir Akses</title>
        <style type="text/css">
            .box{
                width: 600px;
                border: 1px black dashed;
                padding: 20px;
                text-align: center;
            }
        </style>
    </head>
    <body>
        <div class="box">
            <p>Anda Tidak Boleh Mengakses Halaman Ini</p>
            <p>Silahkan Hubungi Administrator</p>
            <!-- <p><?php echo session_status(); ?></p> -->
            <!-- <p><?= session_id() ?></p> -->
            <a href="<?= base_url();?>index.php/home">Sudah login? Klik disini</a>
        </div>
    </body>
    
</html>