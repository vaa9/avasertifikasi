<nav class="navbar navbar-expand-md bg-black user-select-none">
    <div class="container">
        <h3> <a style="color: white">
                UC ShowRoom
            </a>
        </h3>

        <div class="collapse navbar-collapse justify-content-end" id="navbarNav">
            <ul class="navbar-nav nav-pills mr-auto">
                <li class="nav-item" style="margin:5px">
                    <a class="nav-link {{ $active_car ?? '' }}" href="/">Car<i class="fa-solid fa-car fa-fade ms-1"></i></a>
                </li>
                <li class="nav-item" style="margin:5px">
                    <a class="nav-link {{ $active_motorcycle ?? '' }}" href="/motorcycle">Motorcycle<i class="fa-solid fa-motorcycle fa-fade ms-1"></i></a>
                </li>
                <li class="nav-item" style="margin:5px">
                    <a class="nav-link {{ $active_truck ?? '' }}" href="/truck">Truck<i class="fa-solid fa-truck fa-fade ms-1"></i></a>
                </li>
                <li class="nav-item" style="margin:5px">
                    <a class="nav-link {{ $active_order ?? '' }}" href="/order">Order<i class="fa-solid fa-cart-shopping fa-fade ms-1"></i></a>
                </li>
                <li class="nav-item" style="margin:5px">
                    <a class="nav-link {{ $active_customer ?? '' }}" href="/customer">Customer<i class="fa-solid fa-person fa-fade ms-1"></i></a>
                </li>
            </ul>
        </div>
    </div>
</nav>