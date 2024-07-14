<nav class="navbar navbar-expand-lg bg-dark fixed-top">
        <div class="container-fluid">
            <div class="dorong">
                <a class="navbar-brand ml-5" href="#">
                    <span class="text-orange">E</span>
                    <span class="text-white">-SHOP</span>
                </a>
            </div>
            <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
            </button>
            <div class="collapse navbar-collapse" id="navbarSupportedContent">
                <ul class="navbar-nav me-auto mb-2 mb-lg-0">
                    <li class="nav-item">
                        <a class="nav-link active navbar-links" aria-current="page" href="/home" style="color:white;">Home</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link navbar-links" href="/keranjang" style="color:white;">Keranjang</a>
                    </li>
                  
                </ul>
                <form class="d-flex" role="search" action="{{ route('search') }}" method="GET">
                    
                    <li class="nav-item">
                        <a class="nav-link navbar-links" href="/" style="color:white;">Logout</a>
                    </li>
                </form>
            </div>
        </div>
    </nav>