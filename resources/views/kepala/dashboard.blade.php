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
                                    ->where('status', '!=', 'Diterima')
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
                    <div class="col-lg-3 col-xs-6">
                        <!-- small box -->
                        <div class="small-box bg-yellow">
                            <div class="inner">
                                <h3>{{DB::table('disposisi')
                                        ->join('surat', 'disposisi.s_id', '=', 'surat.s_id')
                                        ->where('surat.tipe', '=', 'Masuk')
                                        ->where('surat.status', '=', 'Disposisi')
                                        ->where('disposisi.disposisi', '=',Session::get('nama'))
                                    ->count()}}</h3>
                                <p>Disposisi Baru</p>
                            </div>
                            <div class="icon">
                                <i class="ion ion-email-unread"></i>
                            </div>
                            <a href="{{ url('disposisi-baru/'.Session::get('nama')) }}" class="small-box-footer">Klik Disini <i
                                    class="fa fa-arrow-circle-right"></i></a>
                        </div>
                    </div>
                </div>
            </section>
            <!-- /.Left col -->