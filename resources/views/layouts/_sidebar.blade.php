<header class="header">
    <div class="header-block header-block-collapse">
        <button class="collapse-btn" id="sidebar-collapse-btn">
        <i class="fa fa-bars"></i>
        </button>
    </div>
    <div class="header-block header-block-nav">
        <ul class="nav-profile">
            <li class="dropdown" style="max-width: 200px;min-width: 100px; padding: 0px 20px;">
                <select class="form-control form-control-sm input-xm mem_comp col-12" onchange="regeneratedSession()" name="mem_comp">
                    @foreach(App\mMember::perusahaan() as $data)
                    <option @if(Session::get('user_comp')==$data->c_id) selected="" @endif
                    value="{{$data->c_id}}">{{$data->c_name}}</option>
                    @endforeach
                </select>
            </li>
            <li class="dropdown topbar-user"><a href="#"><img alt="" class="img-responsive rounded-circle" src="{{asset('assets/assets/faces/4.jpg')}}" style="width:30px; height:30px;">&nbsp;<span class="hidden-xs">{{ Auth::user()->m_username }}</span></a>
            </li>
            <li class="dropdown">
                
                <div class="dropdown-divider"></div>
                <a id="btn-logout" class="dropdown-item"
                    href="{{url('logout')}}" onclick="event.preventDefault();">
                <i class="fa fa-power-off icon"></i> Logout </a>
                <form id="logout-form" action="{{url('logout')}}" method="POST" style="display: none;">
                    {{ csrf_field() }}
                </form>
            </li>
        </ul>
    </div>
</header>
<aside class="sidebar">
    <div class="sidebar-container">
        <div class="sidebar-header">
            <div class="brand">
                <img src="{{asset('assets/img/games.ico')}}" height="45px" width="45px" class="mr-2">
                <span class="brand-title">Simdes Wonokerto</span>
            </div>
            <form role="search">
                <div class="input-container">
                    <div class="input-container-prepend">
                        <button class="btn btn-secondary btn-sm" type="button" id="btn-search-menu">
                        <i class="fa fa-search"></i>
                        </button>
                    </div>
                    <input type="search" placeholder="Cari Menu" id="filterInput">
                    <button type="button" class="btn btn-secondary btn-sm d-none" id="btn-reset">
                    <i class="fa fa-times"></i>
                    </button>
                    <div class="underline"></div>
                </div>
            </form>
        </div>
        <nav class="menu" id="sidebar">
            <ul class="sidebar-menu metismenu" id="sidebar-menu">
                <li class="{{Request::is('home') ? 'active' : ''  || Request::is('/') ? 'active' : ''}}">
                    <a href="{{url('/')}}">
                        <i class="fa fa-home"></i>
                        <span class="menu-title">Dashboard </span>
                    </a>
                </li>
                <li class="{{Request::is('master/*') ? 'active open' : ''}}">
                    <a href="#">
                        <i class="fa fa-th-large"></i>
                        <span class="menu-title">Master Data</span>
                        <i class="fa arrow"></i>
                    </a>
                    <ul class="sidebar-nav">
                        <li class="{{Request::is('master/datajabatan/*') ? 'active' : ''}}">
                            <a href="{{route('datajabatan')}}">Jabatan</a>
                        </li>
                        <li class="{{Request::is('master/datapegawai/*') ? 'active' : ''}}">
                            <a href="{{route('datapegawai')}}">Pegawai Desa</a>
                        </li>
                        <li class="{{Request::is('master/penduduk/*') ? 'active' : ''}}">
                            <a href="{{route('penduduk')}}">Penduduk</a>
                        </li>
                        <li class="{{Request::is('master/kelahiran/*') ? 'active' : ''}}">
                            <a href="{{route('kelahiran')}}">Kelahiran</a>
                        </li>
                        <li class="{{Request::is('master/kematian/*') ? 'active' : ''}}">
                            <a href="{{route('kematian')}}">Kematian</a>
                        </li>
                        <li class="{{Request::is('master/pmasuk/*') ? 'active' : ''}}">
                            <a href="{{route('pmasuk')}}">Penduduk Masuk</a>
                        </li>
                        <li class="{{Request::is('master/pkeluar/*') ? 'active' : ''}}">
                            <a href="{{route('pkeluar')}}">Penduduk Keluar</a>
                        </li>
                        <li class="{{Request::is('master/pindahrt/*') ? 'active' : ''}}">
                            <a href="{{route('pindahrt')}}">Penduduk Pindah RT</a>
                        </li>
                    </ul>
                </li>
                <li class="{{Request::is('pembuatan/*') ? 'active open' : ''}}">
                    <a href="#">
                        <i class="fa fa-credit-card"></i>
                        <span class="menu-title">Pembuatan</span>
                        <i class="fa arrow"></i>
                    </a>
                    <ul class="sidebar-nav">
                        <li class="{{Request::is('pembuatan/surat/*') ? 'active' : ''}}">
                            <a href="{{route('surat')}}"> Surat </a>
                        </li>
                        <li class="{{Request::is('pembuatan/laporan/*') ? 'active' : ''}}">
                            <a href="{{route('laporan')}}"> Laporan </a>
                        </li>
                    </ul>
                </li>
                <li class="{{Request::is('reff/*') ? 'active open' : ''}}">
                    <a href="#">
                        <i class="fa fa-money"></i>
                        <span class="menu-title">Data Referensi</span>
                        <i class="fa arrow"></i>
                    </a>
                    <ul class="sidebar-nav">
                        <li class="{{Request::is('reff/rkode/*') ? 'active' : ''}}">
                            <a href="{{route('rkode')}}"> Reff Kode Surat </a>
                        </li>
                        <li  class="{{Request::is('reff/rpekerjaan/*') ? 'active' : ''}}">
                            <a href="{{route('rpekerjaan')}}"> Reff Pekerjaan </a>
                        </li>
                    </ul>
                </li>
                <li class="{{Request::is('system/*') ? 'active open' : ''}}">
                    <a href="#">
                        <i class="fa fa-user-circle-o "></i><span class="menu-title"> Admin System</span>
                        <i class="fa arrow"></i>
                    </a>
                    <ul class="sidebar-nav">
                        <li class="{{Request::is('system/manajemenhakakses/*') ? 'active' : ''}}">
                            <a href="{{route('manajemenhakakses')}}"> Manajemen Hak Akses</a>
                        </li>
                    </ul>
                </li>
            </ul>
        </nav>
    </div>
    <footer class="sidebar-footer">
        <ul class="sidebar-menu metismenu" id="customize-menu">
            <li>
                <ul>
                    <li class="customize">
                        <div class="customize-item">
                            <div class="row customize-header">
                                <div class="col-4"> </div>
                                <div class="col-4">
                                    <label class="title">fixed</label>
                                </div>
                                <div class="col-4">
                                    <label class="title">static</label>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-4">
                                    <label class="title">Sidebar:</label>
                                </div>
                                <div class="col-4">
                                    <label>
                                        <input class="radio" type="radio" name="sidebarPosition" value="sidebar-fixed">
                                        <span></span>
                                    </label>
                                </div>
                                <div class="col-4">
                                    <label>
                                        <input class="radio" type="radio" name="sidebarPosition" value="">
                                        <span></span>
                                    </label>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-4">
                                    <label class="title">Header:</label>
                                </div>
                                <div class="col-4">
                                    <label>
                                        <input class="radio" type="radio" name="headerPosition" value="header-fixed">
                                        <span></span>
                                    </label>
                                </div>
                                <div class="col-4">
                                    <label>
                                        <input class="radio" type="radio" name="headerPosition" value="">
                                        <span></span>
                                    </label>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-4">
                                    <label class="title">Footer:</label>
                                </div>
                                <div class="col-4">
                                    <label>
                                        <input class="radio" type="radio" name="footerPosition" value="footer-fixed">
                                        <span></span>
                                    </label>
                                </div>
                                <div class="col-4">
                                    <label>
                                        <input class="radio" type="radio" name="footerPosition" value="">
                                        <span></span>
                                    </label>
                                </div>
                            </div>
                        </div>
                        <div class="customize-item">
                            <ul class="customize-colors">
                                <li>
                                    <span class="color-item color-red" data-theme="red"></span>
                                </li>
                                <li>
                                    <span class="color-item color-orange" data-theme="orange"></span>
                                </li>
                                <li>
                                    <span class="color-item color-green active" data-theme=""></span>
                                </li>
                                <li>
                                    <span class="color-item color-seagreen" data-theme="seagreen"></span>
                                </li>
                                <li>
                                    <span class="color-item color-blue" data-theme="blue"></span>
                                </li>
                                <li>
                                    <span class="color-item color-purple" data-theme="purple"></span>
                                </li>
                            </ul>
                        </div>
                    </li>
                </ul>
                <a href="#">
                    <i class="fa fa-cog"></i>
                    <span class="customize-menu-title">Customize </span>
                </a>
            </li>
        </ul>
    </footer>
</aside>
<div class="sidebar-overlay" id="sidebar-overlay"></div>
<div class="sidebar-mobile-menu-handle" id="sidebar-mobile-menu-handle"></div>
<div class="mobile-menu-handle"></div>
