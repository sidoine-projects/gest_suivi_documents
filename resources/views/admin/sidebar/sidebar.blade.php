<!-- [ Layout sidenav ] Start -->
<div style =" z-index: 2;" id="layout-sidenav" class="layout-sidenav sidenav sidenav-vertical bg-dark ">
    <!-- Brand demo (see assets/css/demo/demo.css) -->
    <div class="app-brand demo " >
        <span class=" demo " >
            <img width="30" src="{{ asset('assets/images/logo-pigier.PNG') }}" alt="Brand Logo" class="img-fluid">
    
        </span>
        <a href="#"
            class="app-brand-text demo sidenav-text font-weight-normal ml-2">{{ Auth::user()->name }}</a>
        <a  href="javascript:" class="layout-sidenav-toggle sidenav-link text-large ml-auto">
            <i class="ion ion-md-menu align-middle"></i>
        </a>
    </div>

    {{-- <div class="sidenav-divider mt-0 " style="margin-top: -29px !important"></div> --}}
    <div class="sidenav-divider mt-0" ></div>


    <!-- Links -->
    <ul class="sidenav-inner py-1">

        <!-- Dashboards -->
        <li class="sidenav-item active">
            <a href="{{ route('admin/home') }}" class="sidenav-link">
                <i class="sidenav-icon feather icon-home"></i>
                <div>Dashboards</div>
                @if (Auth::user()->role_name == 'Admin')
                    <div class="pl-1 ml-auto">
                        <div class="badge badge-success">{{ Auth::user()->role_name }}</div>
                    </div>
                @endif
                @if (Auth::user()->role_name == 'Normal User')
                    <div class="pl-1 ml-auto">
                        <div class="badge badge-danger">{{ Auth::user()->role_name }}</div>
                    </div>
                @endif
                @if (Auth::user()->role_name == null)
                    <div class="pl-1 ml-auto">
                        <div class="badge badge-warning">{{ Auth::user()->role_name }} {{ '[N/A]' }}</div>
                    </div>
                @endif
            </a>
        </li>

        <!-- Layouts -->
        {{-- <li class="sidenav-divider mb-1"></li> --}}
        {{-- <li class="sidenav-header small font-weight-semibold">SUIVI</li> --}}



        <li class="sidenav-item">
            <a href="javascript:" class="sidenav-link sidenav-toggle">
                <i class="sidenav-icon feather icon-menu"></i>
                <div>PARAMETRE</div>
            </a>
            <ul class="sidenav-menu">
                <li class="sidenav-item">
                    <!-- route n'existe pas sans le name du web.php-->
                    <a href="javascript:" class="sidenav-link sidenav-toggle">
                        {{-- <i class="sidenav-icon feather icon-cloud-lightning"></i> --}}
                        <i class="sidenav-icon feather icon-folder"></i>
                        <div> Profil</div>
                    </a>

                    <ul class="sidenav-menu">
                        <li class="sidenav-item">
                            <!-- route n'existe pas sans le name du web.php-->
                            <a href="{{route('profil/new')}}" class="sidenav-link">
                                <i class="sidenav-icon feather icon-edit"></i>
                                <div>Ajouter</div>
                            </a>
                        </li>
                        <li class="sidenav-item">
                            <!-- route n'existe pas sans le name du web.php-->
                            <a href="{{route('profils')}}" class="sidenav-link">
                                <i class="sidenav-icon feather icon-edit"></i>
                                <div>Liste</div>
                            </a>
                        </li>

                        
                    </ul>
                </li>
            </ul>
            <ul class="sidenav-menu">
                <li class="sidenav-item">
                    <!-- route n'existe pas sans le name du web.php-->
                    <a href="javascript:" class="sidenav-link sidenav-toggle">
                        <i class="sidenav-icon feather icon-file-minus"></i>
                        <div>Types Pieces</div>
                    </a>
                    <ul class="sidenav-menu">
                        <li class="sidenav-item">
                            <!-- route n'existe pas sans le name du web.php-->
                            <a href="{{route('profil/new')}}" class="sidenav-link">
                                <i class="sidenav-icon feather icon-edit"></i>
                                <div>Ajouter</div>
                            </a>
                        </li>

                        
                    </ul>
                </li>
            </ul>
         
        </li>



        <li class="sidenav-item">
            <a href="javascript:" class="sidenav-link sidenav-toggle">
                {{-- <i class="sidenav-icon feather icon-clipboard"></i> --}}
                <i class="sidenav-icon feather icon-user"></i>
                <div>Utilisateurs</div>
            </a>
            <ul class="sidenav-menu">
                <li>
                    <!-- route n'existe pas sans le name du web.php-->
                    <a href="{{route('admin/register')}}" class="sidenav-link  ">
                        {{-- <i class="sidenav-icon feather icon-cloud-lightning"></i> --}}
                        <i class="sidenav-icon feather icon-user"></i>
                        <div>Utilisateurs</div>
                    </a>
                </li>

            </ul>
        </li>
   

    </ul>
</div>
<!-- [ Layout sidenav ] End -->
