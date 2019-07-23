@extends('main')
@section('content')
<article class="content dashboard-page">
    <section class="section">
        <div class="row sameheight-container">
            <div class="col col-12 col-sm-12 col-md-6 col-xl-5 stats-col">
                <div class="card sameheight-item stats" data-exclude="xs">
                    <div class="card-block">
                        <div class="title-block">
                            <h4 class="title"> Penduduk Desa Wonokerto </h4>
                        <p class="title-description">  </a>
                    </p>
                </div>
                <div class="row row-sm stats-container">
                    <div class="col-12 col-sm-6 stat-col">
                        <div class="stat-icon">
                            <i class="fa fa-users"></i>
                        </div>
                        <div class="stat">
                            <div class="value"> Penduduk </div>
                            <div class="name"> {{ $penduduk }} </div>
                        </div>
                        <div class="progress stat-progress">
                            <div class="progress-bar" style="width: 100%;"></div>
                        </div>
                    </div>
                    <div class="col-12 col-sm-6 stat-col">
                        <div class="stat-icon">
                            <i class="fa fa-users"></i>
                        </div>
                        <div class="stat">
                            <div class="value"> Kelahiran </div>
                            <div class="name"> {{ $kelahiran }}</div>
                        </div>
                        <div class="progress stat-progress">
                            <div class="progress-bar" style="width: 100%;"></div>
                        </div>
                    </div>
                    <div class="col-12 col-sm-6  stat-col">
                        <div class="stat-icon">
                            <i class="fa fa-users"></i>
                        </div>
                        <div class="stat">
                            <div class="value"> Kematian </div>
                            <div class="name"> {{ $kematian }} </div>
                        </div>
                        <div class="progress stat-progress">
                            <div class="progress-bar" style="width: 100%;"></div>
                        </div>
                    </div>
                    <div class="col-12 col-sm-6  stat-col">
                        <div class="stat-icon">
                            <i class="fa fa-users"></i>
                        </div>
                        <div class="stat">
                            <div class="value"> Masuk </div>
                            <div class="name"> {{ $penduduk_masuk }} </div>
                        </div>
                        <div class="progress stat-progress">
                            <div class="progress-bar" style="width: 100%;"></div>
                        </div>
                    </div>
                    <div class="col-12 col-sm-6  stat-col">
                        <div class="stat-icon">
                            <i class="fa fa-users"></i>
                        </div>
                        <div class="stat">
                            <div class="value"> Keluar </div>
                            <div class="name"> {{ $penduduk_keluar }} </div>
                        </div>
                        <div class="progress stat-progress">
                            <div class="progress-bar" style="width: 100%;"></div>
                        </div>
                    </div>
                    <div class="col-12 col-sm-6 stat-col">
                        <div class="stat-icon">
                            <i class="fa fa-users"></i>
                        </div>
                        <div class="stat">
                            <div class="value"> Pindah RT </div>
                            <div class="name"> {{ $pindah_rt }} </div>
                        </div>
                        <div class="progress stat-progress">
                            <div class="progress-bar" style="width: 100%;"></div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
</section>

</article>
@endsection