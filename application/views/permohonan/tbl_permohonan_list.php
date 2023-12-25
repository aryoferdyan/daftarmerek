<div class="content-wrapper">
    <section class="content">
        <div class="row">
            <div class="col-xs-12">
                <div class="box box-warning box-solid">
    
                    <div class="box-header">
                        <h3 class="box-title">PERMOHONAN PENDAFTARAN MEREK</h3>
                    </div>
                            

                            <div class="box-body">
                            <div style="padding-bottom: 10px;"'>
                            <?php echo anchor(site_url('permohonan/create'), '<i class="fa fa-wpforms" aria-hidden="true"></i> Ajukan Permohonan', 'class="btn btn-primary btn-sm"'); ?>
                            </div>
                            <table class="table table-bordered table-striped" id="mytable">
                                <thead>
                                    <tr>
                                        <th width="30px">No</th>
                                <th>Tanggal</th>
                                <th>Nama Usaha</th>
                                <th>Alamat</th>
                                <th>Nama Owner</th>
                                <th>Logo</th>
                                <th>Surat</th>
                                <th>Ttd</th>
                                <!-- <th>Id User</th> -->
                                <th>Status</th>
                                <th width="200px">Action</th>
                                    </tr>
                                </thead>
                            
                            </table>
                            </div>
                                        </div>
                                </div>
                                </div>
                        </section>
                    </div>
        <script src="<?php echo base_url('assets/js/jquery-1.11.2.min.js') ?>"></script>
        <script src="<?php echo base_url('assets/datatables/jquery.dataTables.js') ?>"></script>
        <script src="<?php echo base_url('assets/datatables/dataTables.bootstrap.js') ?>"></script>
        <script type="text/javascript">
            $(document).ready(function() {
                $.fn.dataTableExt.oApi.fnPagingInfo = function(oSettings)
                {
                    return {
                        "iStart": oSettings._iDisplayStart,
                        "iEnd": oSettings.fnDisplayEnd(),
                        "iLength": oSettings._iDisplayLength,
                        "iTotal": oSettings.fnRecordsTotal(),
                        "iFilteredTotal": oSettings.fnRecordsDisplay(),
                        "iPage": Math.ceil(oSettings._iDisplayStart / oSettings._iDisplayLength),
                        "iTotalPages": Math.ceil(oSettings.fnRecordsDisplay() / oSettings._iDisplayLength)
                    };
                };

                var t = $("#mytable").dataTable({
                    initComplete: function() {
                        var api = this.api();
                        $('#mytable_filter input')
                                .off('.DT')
                                .on('keyup.DT', function(e) {
                                    if (e.keyCode == 13) {
                                        api.search(this.value).draw();
                            }
                        });
                    },
                    oLanguage: {
                        sProcessing: "loading..."
                    },
                    processing: true,
                    serverSide: true,
                    ajax: {"url": "permohonan/json", "type": "POST"},
                    columns: [
                        {
                            "data": "id_permohonan",
                            "orderable": false
                        },{"data": "tanggal"},{"data": "nama_usaha"},{"data": "alamat"},{"data": "nama_owner"},
                        { "data": "logo",
                            "render": function (data, type, row, meta) {
                                return '<a class="logo-popup" href="<?php echo base_url("uploads/"); ?>' + data + '"><img src="<?php echo base_url("uploads/"); ?>' + data + '" class="img-thumbnail" alt="Logo" width="50" height="50"></a>';
                            }
                        },

                        // surat
                        {
                            "data": "surat",
                            "render": function(data, type, row) {
                                return '<a href="<?php echo base_url("uploads/"); ?>' + data + '" target="_blank" class="btn btn-warning">Lihat Surat</a>';
                            }
                        },
                        
                        // tanda tangan
                        {
                            "data": "ttd",
                            "render": function (data, type, row, meta) {
                                return '<a class="logo-popup" href="<?php echo base_url("uploads/"); ?>' + data + '"><img src="<?php echo base_url("uploads/"); ?>' + data + '" class="img-thumbnail" alt="Logo" width="50" height="50"></a>';
                            }
                        },

                        
                        //{"data": "id_user"},
                        {"data": "status",
                            render: function(data, type) {
                                if (data == 0){
                                    return '<button class="btn btn-primary" readonly>DIAJUKAN</button>';
                                } else if (data == 1){
                                    return '<button class="btn btn-success" readonly>DISETUJUI</button>';
                                } else if (data == 2){
                                    return '<button class="btn btn-warning">PERLU PERBAIKAN</button>';
                                } else if (data == 3){
                                    return '<button class="btn btn-danger">DITOLAK</button>';
                                }
                            } 
                        
                        },
                        {
                            "data" : "action",
                            "orderable": false,
                            "className" : "text-center"
                        }
                    ],
                    order: [[0, 'desc']],
                    rowCallback: function(row, data, iDisplayIndex) {
                        var info = this.fnPagingInfo();
                        var page = info.iPage;
                        var length = info.iLength;
                        var index = page * length + (iDisplayIndex + 1);
                        $('td:eq(0)', row).html(index);
                    }
                });
            });
        </script>
        <script>
            // $(document).ready(function() {
            //     // Inisialisasi Fancybox untuk tindakan klik pada gambar
            //     $('.logo-popup').fancybox({
            //         // Opsi Fancybox
            //         // Anda dapat menyesuaikan opsi sesuai kebutuhan
            //         afterShow: function(instance, current) {
            //             // Tambahkan tombol "X" untuk menutup popup
            //             $('.fancybox-button--close').html('<button type="button" class="btn btn-default fancybox-close-small">X</button>');
            //         }
            //     });
            // });

          
    //         $(document).on('click', '.btn-view-ttd', function() {
    //     var permohonanId = $(this).data('id');
    //     var ttdUrl = baseUrl + permohonanId;

    //     window.open(ttdUrl, '_blank');
    // });

        </script>



</body>
</html>
