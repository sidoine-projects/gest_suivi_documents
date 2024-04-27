
@extends('admin.layouts.master')

@section('content')
      <!-- [ Layout content ] Start -->
      <div class="layout-content">
        <!-- [ content ] Start -->
        <div class="container-fluid flex-grow-1 container-p-y">
            <h4 class="font-weight-bold py-3 mb-0">Dashboard</h4>
            <div class="text-muted small mt-0 mb-4 d-block breadcrumb">
                <ol class="breadcrumb">
                    <li class="breadcrumb-item"><a href="#"><i class="feather icon-home"></i></a></li>
                    <li class="breadcrumb-item"><a href="#">Library</a></li>
                    <li class="breadcrumb-item active">Data</li>
                </ol>
            </div>
            {{-- role name  admin--}}
          
            {{-- end role name admin--}}

            <div class="row">
                <!-- 1st row Start -->
       
                <div class="col-lg-12">
                    <div class="row">
                        <div class="col-md-3">
                            <div class="card mb-4 bg-pattern-2 bg-primary text-white">
                                <div class="card-body">
                                    <div class="d-flex align-items-center">
                                        <div class="lnr lnr-user display-4"></div>
                                        <div class="ml-3">
                                            <div class="small">Total utilisateurs</div>
                                            <div class="text-large">{{$totalUser}}</div>
                                        </div>
                                    </div>
                                    <div id="" class="mt-3 " style="height:40px">ggggggggg</div>
                                </div>
                            </div>
                        </div>
                        <div class="col-md-3">
                            <div class="card mb-4 bg-pattern-2-dark">
                                <div class="card-body">
                                    <div class="d-flex align-items-center">
                                        <div class="lnr lnr-warning display-4 text-primary"></div>
                                        <div class="ml-3">
                                            <div class="text-muted small">Total signalisation</div>
                                            <div class="text-large">{{$totalSignalement}}</div>
                                        </div>
                                    </div>
                                    <div id="ecom-chart-3" class="mt-3 chart-shadow-primary" style="height:40px"></div>
                                </div>
                            </div>
                        </div>
                        <div class="col-md-3">
                            <div class="card mb-4 bg-pattern-2-dark">
                                <div class="card-body">
                                    <div class="d-flex align-items-center">
                                        <div class="lnr lnr-chart-bars display-4 text-primary"></div>
                                        <div class="ml-3">
                                            <div class="text-muted small">Total sondage/Enquête</div>
                                            <div class="text-large">{{$totalSondage}}</div>
                                        </div>
                                    </div>
                                    
                                    <div id="ecom-chart-3" class="mt-3 chart-shadow-primary" style="height:40px"></div>
                                </div>
                            </div>
                        </div>
                        <div class="col-md-3">
                            <div class="card mb-4 bg-pattern-2 bg-primary text-white">
                                <div class="card-body">
                                    <div class="d-flex align-items-center">
                                        <div class="lnr lnr-file-empty display-4"></div>
                                        <div class="ml-3">
                                            <div class="small">Total Actualités</div>
                                            <div class="text-large">{{$totalActualite}}</div>
                                        </div>
                                    </div>
                                    <div id="order-chart-1" class="mt-3 chart-shadow" style="height:40px"></div>
                                </div>
                            </div>
                        </div>
                    
                    </div>
                </div>
                <!-- 1st row Start -->
            </div>
          
        </div>
        <!-- [ content ] End -->

        <!-- [ Layout footer ] Start -->

        <!-- [ Layout footer ] End -->
    </div>
    <!-- [ Layout content ] Start -->
    
@endsection

