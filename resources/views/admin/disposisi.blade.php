<!-- Main content -->
<section class="content">
                <div class="row">
                    <div class="col-xs-12">
                        <div class="box">
                            <div class="box-body">
                                <button type="button" class="btn btn-success" data-toggle="modal"
                                    data-target="#modal-warning">
                                    (+)TAMBAH</button><br><br>
                                <table id="example1" class="table table-bordered table-striped">
                                    <thead>
                                        <tr>
                                            <th style="width:10px">No.</th>
                                            <th style="width: 80px">Nomor Surat</th>
                                            <th>Perihal</th>
                                            <th>Tgl. Surat</th>
                                            <th>Tgl. Terima</th>
                                            <th>Dari</th>
                                            <th>Disposisi ke</th>
                                            <th>Status</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        @php $i=1 @endphp
                                        @foreach($disposisi as $d)
                                        <tr>
                                            <td>{{$i++}}</td>
                                            <td><button type="button" class="btn btn-warning" data-toggle="modal"
                                                    data-target="#modal-{{$d->s_id}}">
                                                    {{$d->no_surat}}
                                                    </button></td>
                                            <td>{{$d->perihal}}</td>
                                            <td>{{date('d-m-Y', strtotime($d->tgl_surat))}}</td>
                                            <td>{{date('d-m-Y', strtotime($d->tgl_terima))}}</td>
                                            <td>{{$d->pengirim}}</td>
                                            <td>{{$d->disposisi}}</td>
                                            <?php echo "<td>"; 
                                            if ($d->status == "Baru") { echo '<strong><span class="badge bg-red">'.$d->status.'</span></strong>'
                                                ; }
                                            elseif($d->status == "Disposisi") { echo '<strong><span class="badge bg-yellow">'.$d->status.'</span></strong>'
                                                ; }
                                            elseif($d->status == "Diteruskan") { echo '<strong><span class="badge bg-blue">'.$d->status.'</span></strong>'
                                                ; }
                                            elseif($d->status == "Diterima") { echo '<strong><span class="badge bg-green">'.$d->status.'</span></strong>'
                                                ; }
                                            echo "</td>"; ?>
                                        </tr>
                                        @endforeach
                                    </tbody>
                                </table>

                                @foreach($disposisi as $d)
                                <div class="modal fade" id="modal-{{$d->s_id}}">
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
                                                            <td><img @if($d->file) src="{{ asset('img/'.$d->file) }}" @endif /></td>
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

                                <div class="modal fade" id="modal-warning">
                                    <div class="modal-dialog">
                                        <div class="modal-content">
                                            <div class="modal-header">
                                                <button type="button" class="close" data-dismiss="modal"
                                                    aria-label="Close">
                                                    <span aria-hidden="true">&times;</span></button>
                                                <h4 class="modal-title">Tambah Disposisi</h4>
                                            </div>
                                            <div class="modal-body">
                                                <!-- /.box-header -->
                                                <div class="box-body">
                                                <form class="form-horizontal"  method="POST" action="{{ URL::to('/tambah-disposisi') }}">
                                                    {{csrf_field()}}
                                                        <div class="box-body">
                                                            <div class="form-group">
                                                                <label for="inputName"
                                                                    class="col-sm-2 control-label">No. Surat</label>
                                                                <div class="col-sm-10">
                                                                    <select name="s_id" class="form-control">
                                                                    @foreach($surat as $s)
                                                                        <option value="{{$s->s_id}}">{{$s->no_surat}}</option>
                                                                    @endforeach
                                                                    </select>
                                                                </div>
                                                            </div>
                                                            <div class="form-group">
                                                                <label for="inputSkills"
                                                                    class="col-sm-2 control-label">Disposisi
                                                                    Kepada</label>
                                                                <div class="col-sm-10">
                                                                    <select name="disposisi" class="form-control">
                                                                    @foreach($users as $u)
                                                                        <option value="{{$u->nama}}">{{$u->nama}}</option>
                                                                    @endforeach
                                                                    </select>
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