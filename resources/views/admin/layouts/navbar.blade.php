<nav class="main-header navbar navbar-expand navbar-dark">
    <ul class="navbar-nav">
        <li class="nav-item">
            <a class="nav-link" data-widget="pushmenu" href="#" role="button"><i class="fas fa-bars"></i></a>
        </li>
        <li class="nav-item d-none d-sm-inline-block">
            <a href="{{ route('dashboard') }}" class="nav-link"> 
               Selamat Datang, 
               <span style="font-weight: 900"> {{ auth()->user()->nama_lengkap }} </span>
              <span class="pl-1" style="color: rgb(137, 137, 137)">( {{  ucfirst(auth()->user()->getRoleName()) }} ) </span> 
                </a> 
        </li>
    </ul>
    <!-- Right navbar links -->
    <ul class="navbar-nav ml-auto">
        <li class="nav-item">
            <a class="nav-link" id="btntheme" role="button">
                {{-- <i id="icontheme" class="fas fa-sun"></i> --}}
                {{ \Carbon\Carbon::now()->translatedFormat('l, d-F-Y')  }}
            </a>
        </li>
        <li class="nav-item">
            <a class="nav-link" href="{{ route('index') }}" target="_bkank" role="button">
                <i class="fas fa-globe"></i>
            </a>
        </li>
        <li class="nav-item dropdown user-menu">
            <a href="#" class="nav-link dropdown-toggle" data-toggle="dropdown">
                <img style="object-fit: cover" src="{{ $fotoProfil }}" class="user-image img-circle elevation-2" alt="User Image">
                <span class="d-none d-md-inline">{{ Auth::user()->name }}</span>
            </a>
            <div class="dropdown-menu dropdown-menu-md dropdown-menu-right">
             
                {{-- <span 
                    class="dropdown-item dropdown-header">
                    <span  class="d-none d-md-inline">{{ Auth::user()->name }}</span></span>
                <div class="dropdown-divider"></div> --}}
                {{-- <span class="dropdown-item dropdown-header">15 Notifications</span> --}}
                <div class="dropdown-divider"></div>
                <a href="#" class="dropdown-item">
                    <i class="fas fa-user-alt mr-2"></i>Profile
                </a>
                <div class="dropdown-divider"></div>
                <a  data-toggle="modal" data-target="#modal-logout" data-backdrop="static" data-keyboard="false" style="padding-bottom: 15px" href="#" class="dropdown-item">
                    <i class="fas fa-sign-out-alt  mr-2"></i> Logout
                </a>
            </div>
        </li>
    </ul>
</nav>
