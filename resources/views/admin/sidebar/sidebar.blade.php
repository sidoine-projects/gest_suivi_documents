<!-- [ Layout sidenav ] Start -->
<div style =" z-index: 2;" id="layout-sidenav" class="layout-sidenav sidenav sidenav-vertical bg-custom-color ">
    <!-- Brand demo (see assets/css/demo/demo.css) -->
    <div class="app-brand demo ">
        <span class=" demo ">
            <img width="30" src="{{ asset('assets/images/logo-pigier.PNG') }}" alt="Brand Logo" class="img-fluid">

        </span>
        {{-- <a href="#" class="app-brand-text demo sidenav-text font-weight-normal ml-2"
            style="color: white;">{{ Auth::user()->name }}</a> --}}
        <a href="javascript:" class="layout-sidenav-toggle sidenav-link text-large ml-auto">
            <i class="ion ion-md-menu align-middle"style="color: white;"></i>
        </a>
    </div>

    {{-- <div class="sidenav-divider mt-0 " style="margin-top: -29px !important"></div> --}}
    <div class="sidenav-divider mt-0"></div>


    <!-- Links -->
    <ul class="sidenav-inner py-1">
        <!-- Dashboards -->
        <li class="sidenav-item active">
            <a href="{{ route('dashboard') }}" class="sidenav-link">
                <i class="sidenav-icon feather icon-home"style="color: white;"></i>
                <div style="color: white;">Dashboards</div>
                @if (Auth::user()->role_name == 'admin')
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

        @if (Auth::user()->role_name == 'admin' || Auth::user()->role_name == 'super_admin')
            <li class="sidenav-item">
                <a href="javascript:" class="sidenav-link sidenav-toggle"style="color: white;">
                    <i class="sidenav-icon feather icon-settings" style="color: white;"></i>
                    <div style="color: white;">PARAMETRE</div>
                </a>

                <ul class="sidenav-menu">
                    <li class="sidenav-item">
                        <!-- route n'existe pas sans le name du web.php-->
                        <a href="javascript:" class="sidenav-link sidenav-toggle"style="color: white;">
                            {{-- <i class="sidenav-icon feather icon-cloud-lightning"></i> --}}
                            <i class="sidenav-icon feather icon-user"style="color: white;"></i>
                            <div> Utilisateur</div>
                        </a>

                        <ul class="sidenav-menu">
                            <li class="sidenav-item">
                                <!-- route n'existe pas sans le name du web.php-->
                                <a href="{{ route('admin/register') }}" class="sidenav-link"style="color: white;">
                                    <i class="sidenav-icon feather icon-plus" style="color: white;"></i>
                                    <div>Ajouter</div>
                                </a>
                            </li>
                            <li class="sidenav-item">
                                <!-- route n'existe pas sans le name du web.php-->
                                <a href="{{ route('admin/users') }}" class="sidenav-link"style="color: white;">
                                    <i class="sidenav-icon feather icon-menu"style="color: white;"></i>
                                    <div>Liste</div>
                                </a>
                            </li>
                        </ul>
                    </li>
                </ul>

                <ul class="sidenav-menu">
                    <li class="sidenav-item">
                        <!-- route n'existe pas sans le name du web.php-->
                        <a href="javascript:" class="sidenav-link sidenav-toggle"style="color: white;">
                            {{-- <i class="sidenav-icon feather icon-cloud-lightning"></i> --}}
                            <i class="sidenav-icon feather icon-users"style="color: white;"></i>
                            <div> Profil</div>
                        </a>

                        <ul class="sidenav-menu">
                            <li class="sidenav-item">
                                <!-- route n'existe pas sans le name du web.php-->
                                <a href="{{ route('profil/new') }}" class="sidenav-link"style="color: white;">
                                    <i class="sidenav-icon feather icon-plus"style="color: white;"></i>
                                    <div>Ajouter</div>
                                </a>
                            </li>
                            <li class="sidenav-item">
                                <!-- route n'existe pas sans le name du web.php-->
                                <a href="{{ route('profils') }}" class="sidenav-link"style="color: white;">
                                    <i class="sidenav-icon feather icon-menu"style="color: white;"></i>
                                    <div>Liste</div>
                                </a>
                            </li>


                        </ul>
                    </li>
                </ul>
                <ul class="sidenav-menu">
                    <li class="sidenav-item">
                        <!-- route n'existe pas sans le name du web.php-->
                        <a href="javascript:" class="sidenav-link sidenav-toggle"style="color: white;">
                            <i class="sidenav-icon feather icon-file-minus"style="color: white;"></i>
                            <div>Types Pieces</div>
                        </a>
                        <ul class="sidenav-menu">
                            <li class="sidenav-item">
                                <!-- route n'existe pas sans le name du web.php-->
                                <a href="{{ route('typepiece/new') }}" class="sidenav-link"style="color: white;">
                                    <i class="sidenav-icon feather icon-plus"style="color: white;"></i>
                                    <div>Ajouter</div>
                                </a>
                            </li>
                            <li class="sidenav-item">
                                <!-- route n'existe pas sans le name du web.php-->
                                <a href="{{ route('typepieces') }}" class="sidenav-link"style="color: white;">
                                    <i class="sidenav-icon feather icon-menu"style="color: white;"></i>
                                    <div>Liste</div>
                                </a>
                            </li>

                        </ul>
                    </li>
                </ul>
                <ul class="sidenav-menu">
                    <li class="sidenav-item">
                        <!-- route n'existe pas sans le name du web.php-->
                        <a href="javascript:" class="sidenav-link sidenav-toggle"style="color: white;">
                            <i class="sidenav-icon feather icon-file-minus"style="color: white;"></i>
                            <div>Pieces</div>
                        </a>
                        <ul class="sidenav-menu">
                            <li class="sidenav-item">
                                <!-- route n'existe pas sans le name du web.php-->
                                <a href="{{ route('piece/new') }}" class="sidenav-link"style="color: white;">
                                    <i class="sidenav-icon feather icon-plus"style="color: white;"></i>
                                    <div>Ajouter</div>
                                </a>
                            </li>
                            <li class="sidenav-item">
                                <!-- route n'existe pas sans le name du web.php-->
                                <a href="{{ route('piece') }}" class="sidenav-link"style="color: white;">
                                    <i class="sidenav-icon feather icon-menu"style="color: white;"></i>
                                    <div>Liste</div>
                                </a>
                            </li>
                        </ul>
                    </li>
                </ul>
            </li>
        @endif

        @if (Auth::user()->role_name == 'etudiant' ||
                Auth::user()->role_name == 'super_admin' ||
                Auth::user()->role_name == 'enseignant')
            <li class="sidenav-item">
                <a href="javascript:" class="sidenav-link sidenav-toggle"style="color: white;">
                    {{-- <i class="sidenav-icon feather icon-clipboard"></i> --}}
                    <i class="sidenav-icon feather icon-file"style="color: white;"></i>
                    <div style="color: white;">Demandes</div>
                </a>
                <ul class="sidenav-menu">
                    <li>
                        <!-- route n'existe pas sans le name du web.php-->
                        <a href="{{ route('demandes/new') }}" class="sidenav-link "style="color: white;">
                            {{-- <i class="sidenav-icon feather icon-cloud-lightning"></i> --}}
                            <i class="sidenav-icon feather icon-plus"style="color: white;"></i>
                            <div>Ajouter</div>
                        </a>
                    </li>
                    <li class="sidenav-item">
                        <!-- route n'existe pas sans le name du web.php-->
                        <a href="{{ route('demandes') }}" class="sidenav-link"style="color: white;">
                            <i class="sidenav-icon feather icon-menu"style="color: white;"></i>
                            <div>Liste</div>
                        </a>
                    </li>
                </ul>
            </li>
        @endif
        @if (Auth::user()->role_name == 'admin' || Auth::user()->role_name == 'super_admin')
            <li class="sidenav-item active">
                <a href="{{ route('demandes/admin') }}" class="sidenav-link">
                    <i class="sidenav-icon feather icon-file-text" style="color: white;"></i>
                    <div style="color: white;">Liste des Demandes</div>

                </a>
            </li>
        @endif

        <li class="sidenav-item active">
            <a href="{{ url('user/update/' . auth()->user()->id) }}" class="sidenav-link">
                <i class="sidenav-icon feather icon-user-check" style="color: white;"></i>
                <div style="color: white;">Profil utilisateur</div>

            </a>
        </li>

    </ul>
</div>
<!-- [ Layout sidenav ] End -->
<style>
    .bg-custom-color {
        background-color: #003679;
    }
</style>
