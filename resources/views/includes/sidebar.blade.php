<div class="border-right" id="sidebar-wrapper">
    <div class="sidebar-heading text-center">
        <!-- <img src="/backend/images/dashboard-store-logo.svg" alt="logo" class="my-4"> -->
        <h5 class="my-4"><span style="color: #071c4d; font-weight:bold;">Sisfo</span> Wisata</h5> <hr>
    </div>
    <div class="list-group list-group-flush">
        <a href="{{route('dashboard')}}" class="list-group-item list-group-item-action {{ (request()->is('dashboard')) ? 'active' : '' }} ">
            Dashboard
        </a>
        <a href="{{route('user.index')}}" class="list-group-item list-group-item-action {{ (request()->is('user')) || (request()->is('user/create')) ? 'active' : '' }}  ">
            Manage Pengguna
        </a>
        <a href="{{route('wisata.index')}}" class="list-group-item list-group-item-action {{ (request()->is('wisata')) || (request()->is('wisata/create')) ? 'active' : '' }}  ">
            Manage Wisata
        </a>
        <a href="{{route('kategori.index')}}" class="list-group-item list-group-item-action {{ (request()->is('kategori')) || (request()->is('kategori/create')) ? 'active' : '' }} ">
            Kategori Wisata
        </a>
        <a href="{{url('/logout')}}" class="list-group-item list-group-item-action" href="{{ route('logout') }}"
                    onclick="event.preventDefault();
                                    document.getElementById('logout-form').submit();" >
            Sign out
        </a>

        <form id="logout-form" action="{{ route('logout') }}" method="POST" class="d-none">
            @csrf
        </form>
    </div>
</div>