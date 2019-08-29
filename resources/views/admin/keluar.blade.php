<!-- Main content -->
<section class="content">
                <div class="row">
                    <div class="col-xs-12">
                        <div class="box">
                            <div class="box-body">
                                <a href="/surat-keluar/keluar_pdf" class="btn btn-primary" target="_blank">CETAK PDF</a><br><br>
                                <table id="example1" class="table table-bordered table-striped">
                                    <thead>
                                        <tr>
                                            <th style="width:10px">No.</th>
                                            <th style="width: 80px">Nomor Surat</th>
                                            <th>Perihal</th>
                                            <th>Tgl. Surat</th>
                                            <th>Untuk</th>
                                            <th style="width:20px">Aksi</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        @php $i=1 @endphp
                                        @foreach($surat as $s)
                                        <tr>
                                            <td>{{$i++}}</td>
                                            <td><button type="button" class="btn btn-warning" data-toggle="modal"
                                                    data-target="#modal-{{$s->s_id}}">
                                                    {{$s->no_surat}}
                                                    </button></td> 
                                            <td>{{$s->perihal}}</td>
                                            <td>{{date('d-m-Y', strtotime($s->tgl_surat))}}</td>
                                            <td>{{$s->penerima}}</td>
                                            <td><a data-toggle="modal" data-target="#modal-edit{{$s->s_id}}"><i
                                                        class="fa fa-edit"></i></a>
                                                <a data-toggle="modal" data-target="#modal-hapus{{$s->s_id}}"><i
                                                        class="fa fa-trash"></i></a></td>
                                        </tr>
                                        @endforeach
                                    </tbody>
                                </table>

                                @foreach($surat as $s)
                                <div class="modal fade" id="modal-{{$s->s_id}}">
                                    <div class="modal-dialog">
                                        <div class="modal-content">
                                            <div class="modal-header">
                                                <h4 class="modal-title">Lampiran Surat</h4>
                                            </div>
                                            <div class="modal-body">
                                                <!-- /.box-header -->
                                                <div class="box-body">
                                                    <table class="table table-bordered">
                                                        <tr>
                                                        <td><img @if($s->file) src="{{ asset('img/'.$s->file) }}" @endif /></td>
                                                        </tr>
                                                    </table>
                                                </div>
                                                <!-- /.box-body -->
                                            </div>
                                            <div class="modal-footer">
                                                <button type="button" class="btn btn-default pull-right"
                                                    data-dismiss="modal">Tutup</button>
                                            </div>
                                        </div>
                                        <!-- /.modal-content -->
                                    </div>
                                    <!-- /.modal-dialog -->
                                </div>
                                <!-- /.modal -->
                                @endforeach

                                @foreach($surat as $s)
                                <div class="modal fade" id="modal-edit{{$s->s_id}}">
                                    <div class="modal-dialog">
                                        <div class="modal-content">
                                            <div class="modal-header">
                                                <button type="button" class="close" data-dismiss="modal"
                                                    aria-label="Close">
                                                    <span aria-hidden="true">&times;</span></button>
                                                <h4 class="modal-title">Edit Data</h4>
                                            </div>
                                            <div class="modal-body">
                                                <!-- /.box-header -->
                                                <div class="box-body">
                                                    <form class="form-horizontal" method="POST" action="{{ URL::to('/edit-keluar/'.$s->s_id) }}">
                                                        {{csrf_field()}}
                                                        <div class="box-body">
                                                            <div class="form-group">
                                                                <label for="inputName"
                                                                    class="col-sm-2 control-label">No. Surat</label>

                                                                <div class="col-sm-10">
                                                                    <input name="no_surat" type="text" class="form-control"
                                                                        id="inputName"
                                                                        placeholder="Masukkan nomor surat" value="{{$s->no_surat}}">
                                                                </div>
                                                            </div>
                                                            <div class="form-group">
                                                                <label for="inputName"
                                                                    class="col-sm-2 control-label">Tanggal
                                                                    Surat</label>

                                                                <div class="col-sm-10">
                                                                    <input name="tgl_surat" type="date" value="{{$s->tgl_surat}}" class="form-control"
                                                                        id="inputName"
                                                                        placeholder="Masukkan tanggal surat">
                                                                </div>
                                                            </div>
                                                            <div class="form-group">
                                                                <label for="inputSkills"
                                                                    class="col-sm-2 control-label">Untuk</label>
                                                                <div class="col-sm-10">
                                                                    <input name="penerima" value="{{$s->penerima}}" type="text" class="form-control"
                                                                        id="inputSkills"
                                                                        placeholder="Masukkan penerima surat">
                                                                </div>
                                                            </div>
                                                            <div class="form-group">
                                                                <label for="inputSkills"
                                                                    class="col-sm-2 control-label">Perihal</label>
                                                                <div class="col-sm-10">
                                                                    <input name="perihal" type="text" value="{{$s->perihal}}" class="form-control"
                                                                        id="inputSkills"
                                                                        placeholder="Masukkan perihal surat">
                                                                </div>
                                                            </div>
                                                            <div class="form-group">
                                                                <label for="inputSkills"
                                                                    class="col-sm-2 control-label">Upload
                                                                    File</label>
                                                                <div class="col-sm-10">
                                                                    <input type="file" class="form-control"
                                                                        id="inputSkills" placeholder="Skills">
                                                                </div>
                                                            </div>
                                                            <div class="form-group">
                                                                <div class="col-sm-offset-2 col-sm-10">
                                                                    <button type="submit"
                                                                        class="btn btn-danger">Tambah</button>
                                                                </div>
                                                            </div>
                                                        </div>
                                                        <!-- /.box-body -->
                                                </div>
                                                <!-- /.box-body -->
                                            </div>
                                            <div class="modal-footer">
                                                <button type="submit" class="btn btn-success pull-right">Simpan</button>
                                            </div>
                                            </form>
                                        </div>
                                        <!-- /.modal-content -->
                                    </div>
                                    <!-- /.modal-dialog -->
                                </div>
                                <!-- /.modal -->
                                @endforeach

                                @foreach($surat as $s)
                                <div class="modal fade" id="modal-hapus{{$s->s_id}}">
                                    <div class="modal-dialog">
                                        <div class="modal-content">
                                            <div class="modal-header">
                                                <button type="button" class="close" data-dismiss="modal"
                                                    aria-label="Close">
                                                    <span aria-hidden="true">&times;</span></button>
                                                <h4 class="modal-title">Hapus Surat</h4>
                                            </div>
                                            <form action="{{ url('/hapus-masuk/'.$s->s_id) }}" method="POST" class="form-horizontal">
                                                {{csrf_field()}}
                                                {{ method_field('DELETE') }}
                                                <div class="modal-body">
                                                    <p>Apakah Anda yakin menghapus data ini?</p>
                                                </div>
                                                <div class="modal-footer">
                                                    <button type="submit" class="btn btn-danger pull-right">Hapus</button>
                                                </div>
                                            </form>
                                        </div>
                                        <!-- /.modal-content -->
                                    </div>
                                    <!-- /.modal-dialog -->
                                </div>
                                <!-- /.modal -->
                                @endforeach

                            </div>
                            <!-- /.box-body -->
                        </div>
                        <!-- /.box -->
                    </div>
                    <!-- /.col -->
                </div>
                <!-- /.row -->
            </section>
            <!-- /.content -->