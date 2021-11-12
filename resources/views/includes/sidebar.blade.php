<div class="border-right" id="sidebar-wrapper">
    <div class="sidebar-heading text-center">
        <img src="/backend/images/dashboard-store-logo.svg" alt="logo" class="my-4">
    </div>
    <div class="list-group list-group-flush">
        <a href="{{route('dashboard')}}" class="list-group-item list-group-item-action {{ (request()->is('dashboard')) ? 'active' : '' }} ">
            Dashboard
        </a>
        <a href="{{route('wisata.index')}}" class="list-group-item list-group-item-action {{ (request()->is('wisata')) || (request()->is('wisata/create')) ? 'active' : '' }}  ">
            Wisata
        </a>
        <a href="transaction.html" class="list-group-item list-group-item-action">
            Gallery Wisata
        </a>
        <a href="{{route('kategori.index')}}" class="list-group-item list-group-item-action {{ (request()->is('kategori')) || (request()->is('kategori/create')) ? 'active' : '' }} ">
            Kategori Wisata
        </a>
        <a href="index.html" class="list-group-item list-group-item-action">
            Sign out
        </a>
    </div>
</div>