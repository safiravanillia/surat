<!-- Main content -->
<section class="content">
                <!-- Small boxes (Stat box) -->
                <div class="row">
                    <div class="col-lg-3 col-xs-6">
                        <!-- small box -->
                        <div class="small-box bg-green">
                            <div class="inner">
                                <h3>{{DB::table('surat')->where('tipe', '=', 'Masuk')->count()}}</h3>
                                <p>Surat Masuk</p>
                            </div>
                            <div class="icon">
                                <i class="ion ion-email-unread"></i>
                            </div>
                            <a href="{{ url('surat-masuk') }}" class="small-box-footer">Klik Disini <i
                                    class="fa fa-arrow-circle-right"></i></a>
                        </div>
                    </div>
                    <!-- ./col -->
                    <div class="col-lg-3 col-xs-6">
                        <!-- small box -->
                        <div class="small-box bg-yellow">
                            <div class="inner">
                                <h3>{{DB::table('surat')->where('tipe', '=', 'Keluar')->count()}}</h3>
                                <p>Surat Keluar</p>
                            </div>
                            <div class="icon">
                                <i class="ion ion-email"></i>
                            </div>
                            <a href="{{ url('surat-keluar') }}" class="small-box-footer">Klik Disini <i
                                    class="fa fa-arrow-circle-right"></i></a>
                        </div>
                    </div>
                    <!-- ./col -->
                </div>
                <!-- /.row -->
                <div class="row">
                    <div class="col-xs-12">
                        <div class="box box-default">
                            <div class="nav-tabs-custom">
                                <ul class="nav nav-tabs">
                                    <li class="active"><a href="#masuk" data-toggle="tab">Surat Masuk</a></li>
                                    <li><a href="#keluar" data-toggle="tab">Surat Keluar</a></li>
                                </ul>
                                <div class="tab-content">
                                    <div class=" active tab-pane" id="masuk">
                                        <form class="form-horizontal"  method="POST" action="{{ URL::to('/tambah-masuk') }}" enctype="multipart/form-data">
                                        {{csrf_field()}}
                                            <div class="form-group">
                                                <label for="inputName" class="col-sm-2 control-label">No. Surat</label>

                                                <div class="col-sm-10">
                                                    <input name="no_surat" type="text" class="form-control" id="inputName"
                                                        placeholder="Masukkan nomor surat">
                                                </div>
                                            </div>
                                            <div class="form-group">
                                                <label for="inputEmail" class="col-sm-2 control-label">Tanggal
                                                    Terima</label>

                                                <div class="col-sm-10">
                                                    <input name="tgl_terima" type="date" class="form-control" id="inputEmail"
                                                        placeholder="Masukkan tanggal terima">
                                                </div>
                                            </div>
                                            <div class="form-group">
                                                <label for="inputName" class="col-sm-2 control-label">Tanggal
                                                    Surat</label>

                                                <div class="col-sm-10">
                                                    <input name="tgl_surat" type="date" class="form-control" id="inputName"
                                                        placeholder="Masukkan tanggal surat">
                                                </div>
                                            </div>
                                            <div class="form-group">
                                                <label for="inputExperience" class="col-sm-2 control-label">Dari</label>
                                                <div class="col-sm-10">
                                                    <input name="pengirim" type="text" class="form-control" id="inputSkills"
                                                        placeholder="Masukkan asal surat">
                                                </div>
                                            </div>
                                            <div class="form-group">
                                                <label for="inputSkills" class="col-sm-2 control-label">Untuk</label>
                                                <div class="col-sm-10">
                                                    <select name="penerima" class="form-control">
                                                        @foreach($users as $u)
                                                            <option value="{{$u->nama}}">{{$u->nama}}</option>
                                                        @endforeach
                                                    </select>
                                                </div>
                                            </div>
                                            <div class="form-group">
                                                <label for="inputSkills" class="col-sm-2 control-label">Perihal</label>
                                                <div class="col-sm-10">
                                                    <input name="perihal" type="text" class="form-control" id="inputSkills"
                                                        placeholder="Masukkan perihal surat">
                                                </div>
                                            </div>
                                            <div class="form-group">
                                                <label for="inputSkills" class="col-sm-2 control-label">Upload
                                                    File</label>
                                                <div class="col-sm-10">
                                                    <input name="file" type="file" class="form-control" id="inputSkills"
                                                        placeholder="Skills"> .jpg .png only
                                                </div>
                                            </div>
                                            <div class="form-group">
                                                <div class="col-sm-offset-2 col-sm-10">
                                                    <button type="submit" class="btn btn-danger">Tambah</button>
                                                </div>
                                            </div>
                                        </form>
                                    </div>
                                    <!-- /.tab-pane -->

                                    <div class=" tab-pane" id="keluar">
                                        <form class="form-horizontal"  method="POST" action="{{ URL::to('/tambah-keluar') }}" enctype="multipart/form-data">
                                        {{csrf_field()}}
                                            <div class="form-group">
                                                <label for="inputName" class="col-sm-2 control-label">No. Surat</label>
                                                <div class="col-sm-10">
                                                    <input name="no_surat" type="text" class="form-control" id="inputName"
                                                        placeholder="Masukkan nomor surat">
                                                </div>
                                            </div>
                                            <div class="form-group">
                                                <label for="inputName" class="col-sm-2 control-label">Tanggal
                                                    Surat</label>

                                                <div class="col-sm-10">
                                                    <input name="tgl_surat" type="date" class="form-control" id="inputName"
                                                        placeholder="Masukkan tanggal surat">
                                                </div>
                                            </div>
                                            <div class="form-group">
                                                <label for="inputSkills" class="col-sm-2 control-label">Untuk</label>
                                                <div class="col-sm-10">
                                                    <input name="penerima" type="text" class="form-control" id="inputSkills"
                                                        placeholder="Masukkan penerima surat">
                                                </div>
                                            </div>
                                            <div class="form-group">
                                                <label for="inputSkills" class="col-sm-2 control-label">Perihal</label>
                                                <div class="col-sm-10">
                                                    <input name="perihal" type="text" class="form-control" id="inputSkills"
                                                        placeholder="Masukkan perihal surat">
                                                </div>
                                            </div>
                                            <div class="form-group">
                                                <label for="inputSkills" class="col-sm-2 control-label">Upload
                                                    File</label>
                                                <div class="col-sm-10">
                                                    <input name="file" type="file" class="form-control" id="inputSkills"
                                                        placeholder="Skills"> .jpg .png only
                                                </div>
                                            </div>
                                            <div class="form-group">
                                                <div class="col-sm-offset-2 col-sm-10">
                                                    <button type="submit" class="btn btn-danger">Tambah</button>
                                                </div>
                                            </div>
                                        </form>
                                    </div>
                                    <!-- /.tab-pane -->
                                </div>
                                <!-- /.tab-content -->
                            </div>
                            <!-- /.nav-tabs-custom -->
                        </div>
                    </div>
                </div>
            </section>
            <!-- /.Left col -->