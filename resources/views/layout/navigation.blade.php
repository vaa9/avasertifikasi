<nav class="navbar navbar-expand-md bg-black user-select-none">
    <div class="container">
        <h3> <a style="color: white">
                Library Konoha
            </a>
        </h3>

        <div class="collapse navbar-collapse justify-content-end" id="navbarNav">
            <ul class="navbar-nav nav-pills mr-auto">
                <li class="nav-item" style="margin:5px">
                    <a class="nav-link {{ $active_admin ?? '' }}" href="/admin">Admin</a>
                </li>
                <li class="nav-item" style="margin:5px">
                    <a class="nav-link {{ $active_peminjam?? '' }}" href="/peminjam">Peminjam</a>
                </li>
                <li class="nav-item" style="margin:5px">
                    <a class="nav-link {{ $active_buku ?? '' }}" href="/buku">Katalog</a>
                </li>
                <li class="nav-item" style="margin:5px">
                    <a class="nav-link {{ $active_peminjaman ?? '' }}" href="/peminjaman">Peminjaman</a>
                </li>
                <li class="nav-item" style="margin:5px">
                    <a class="nav-link {{ $active_logout ?? '' }}" href="/">Logout</a>
                </li>
            </ul>
        </div>
    </div>
</nav>