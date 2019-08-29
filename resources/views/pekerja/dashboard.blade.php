<!-- Main content -->
<section class="content">
                <!-- Small boxes (Stat box) -->
                <div class="row">
                    <div class="col-lg-3 col-xs-6">
                        <!-- small box -->
                        <div class="small-box bg-green">
                            <div class="inner">
                                <h3>{{DB::table('surat')
                                    ->where('tipe', '=', 'Masuk')
                                    ->where('status', '=', 'Diteruskan')
                                    ->where('penerima', '=', Session::get('nama'))
                                    ->count()}}</h3>
                                <p>Surat Baru</p>
                            </div>
                            <div class="icon">
                                <i class="ion ion-email-unread"></i>
                            </div>
                            <a href="{{ url('surat-baru/'.Session::get('nama')) }}" class="small-box-footer">Klik Disini <i
                                    class="fa fa-arrow-circle-right"></i></a>
                        </div>
                    </div>
                </div>
            </section>
            <!-- /.Left col -->
        </div>
        <!-- /.content-wrapper -->