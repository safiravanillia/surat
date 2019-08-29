<!-- Left side column. contains the logo and sidebar -->
<aside class="main-sidebar">
            <!-- sidebar: style can be found in sidebar.less -->
            <section class="sidebar">
                <!-- Sidebar user panel -->
                <div class="user-panel">
                    <div class="pull-left image">
                        <img src="dist/img/user2-160x160.jpg" class="img-circle" alt="User Image">
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
                    <li class="treeview">
                        <a href="#">
                            <i class="fa fa-envelope"></i> <span>Data Surat</span>
                            <span class="pull-right-container">
                                <i class="fa fa-angle-left pull-right"></i>
                            </span>
                        </a>
                        <ul class="treeview-menu">
                            <li><a href="{{ url('surat-masuk') }}"><i class="fa fa-circle-o"></i> Surat Masuk</a></li>
                            <li><a href="{{ url('surat-keluar') }}"><i class="fa fa-circle-o"></i> Surat Keluar</a></li>
                        </ul>
                    </li>
                    <li><a href="{{ url('disposisi') }}"><i class="fa fa-users"></i> <span>Disposisi</span></a></li>
                </ul>
            </section>
            <!-- /.sidebar -->
        </aside>