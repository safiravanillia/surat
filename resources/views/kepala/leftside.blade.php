<!-- Left side column. contains the logo and sidebar -->
<aside class="main-sidebar">
            <!-- sidebar: style can be found in sidebar.less -->
            <section class="sidebar">
                <!-- Sidebar user panel -->
                <div class="user-panel">
                    <div class="pull-left image">
                        <img src="{{ URL::asset('dist/img/user2-160x160.jpg') }}" class="img-circle" alt="User Image">
                    </div>
                    <div class="pull-left info">
                        <p>{{Session::get('nama')}}</p>
                        <a href="#"><i class="fa fa-circle text-success"></i> Online</a>
                    </div>
                </div>

                <!-- sidebar menu: : style can be found in sidebar.less -->
                <ul class="sidebar-menu" data-widget="tree">
                    <li class="header">MAIN NAVIGATION</li>
                    <li><a href="{{ url('dashboard') }}"><i class="fa fa-dashboard"></i> <span>Dashboard</span></a></li>
                    <li><a href="{{ url('data-surat/'.Session::get('nama')) }}"><i class="fa fa-envelope"></i> <span>Data Surat</span></a></li>
                    <li><a href="{{ url('data-disposisi/'.Session::get('nama')) }}"><i class="fa fa-envelope"></i> <span>Data Disposisi</span></a>
                    </li>
                </ul>
            </section>
            <!-- /.sidebar -->
        </aside>