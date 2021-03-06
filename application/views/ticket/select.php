<div id="page-wrapper">
    <div class="row">
        <div class="col-lg-12">
            <h1 class="page-header"> Ticket Baru</h1>
        </div>
        <!-- /.col-lg-12 -->
    </div>
    <!-- /.row -->
    <div class="row">
        <div class="col-lg-12">
            <!-- /.panel -->
            <div class="panel panel-default">
                <div class="panel-heading">
                    <i class="fa fa-bar-chart-o fa-fw"></i> Sistem Pemeliharaan Produk | <?php echo $title ?>
                </div>

                <div class="panel-body">
                    <div class="row">
                        <div class="col-lg-12">
                            <?php if(isset($message)) { ?>
                                <div class="alert alert-warning"><?php echo $message;?></div>
                            <?php } ?>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-lg-12">
                            <table cellpadding=0 cellspacing=10 class="table" id="datatable" data-url="<?php echo $table_url; ?>">
                                <thead>
                                    <tr>
                                        <?php if ($type == 'by_device') { ?>
                                        <th>No</th>
                                        <th>Serial Number</th>
                                        <th>Nama Perangkat</th>
                                        <th>Nama Customer</th>
                                        <th>No. BoQ</th>
                                        <th>Aksi</th>
                                        <?php } else if ($type == 'by_customer') { ?>
                                        <th>No</th>
                                        <th>Nama Customer</th>
                                        <th>Alamat</th>
                                        <th>Kota</th>
                                        <th>Provinsi</th>
                                        <th>PIC</th>
                                        <th>Kontak</th>
                                        <th>Email</th>
                                        <th>Aksi</th>
                                        <?php } ?>
                                    </tr>
                                </thead>
                                <tbody>
                                </tbody>
                            </table>
                        </div>
                    </div>
                    <!-- /.row -->
                </div>
            </div>
            <!-- /.panel-heading -->
            <!-- /.panel-body -->
        </div>
        <!-- /.panel -->
    </div>
</div>