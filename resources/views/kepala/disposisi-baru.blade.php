<!-- Main content -->
<section class="content">
                <div class="row">
                    <div class="col-xs-12">
                        <div class="box">
                            <div class="box-body">
                                <table id="example1" class="table table-bordered table-striped">
                                    <thead>
                                        <tr>
                                            <th style="width:10px">No.</th>
                                            <th style="width: 80px">Nomor Surat</th>
                                            <th>Perihal</th>
                                            <th>Tgl. Surat</th>
                                            <th>Tgl. Terima</th>
                                            <th>Dari</th>
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
                                            <td>{{date('d-m-Y', strtotime($s->tgl_terima))}}</td>
                                            <td>{{$s->pengirim}}</td>
                                            <td>{{$s->penerima}}</td>
                                            <td><button type="button" class="btn btn-success" data-toggle="modal"
                                                data-target="#modal-d{{$s->s_id}}">
                                                DISPOSISI
                                                </button></td>
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
                                <div class="modal fade" id="modal-d{{$s->s_id}}">
                                    <div class="modal-dialog">
                                        <div class="modal-content">
                                            <div class="modal-header">
                                                <button type="button" class="close" data-dismiss="modal"
                                                    aria-label="Close">
                                                    <span aria-hidden="true">&times;</span></button>
                                                <h4 class="modal-title">Disposisi Surat</h4>
                                            </div>
                                            <div class="modal-body">
                                                <!-- /.box-header -->
                                                <div class="box-body">
                                                    <form class="form-horizontal" method="POST" action="{{ URL::to('/disposisi-baru/update/'.$s->d_id) }}">
                                                        {{csrf_field()}}
                                                        <div class="box-body">
                                                            <div class="form-group">
                                                                <label for="inputName"
                                                                    class="col-sm-2 control-label">Catatan</label>
                                                                <div class="col-sm-10">
                                                                    <textarea name="catatan" class="form-control" rows="3" placeholder="Masukkan catatan"></textarea>
                                                                </div>
                                                            </div>
                                                        </div>
                                                        <!-- /.box-body -->
                                                </div>
                                                <!-- /.box-body -->
                                            </div>
                                            <div class="modal-footer">
                                                <button type="submit" class="btn btn-success pull-right">Kirim</button>
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