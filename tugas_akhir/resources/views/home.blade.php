@include('bagian.header')

@include('bagian.navbar')

<div class="container">
    <h4>Produk Unggulan</h4>
    
    <!-- Carousel Container -->
    <div class="carousel-container mt-0 mb-3">
        <div class="carousel">
            <img src="img/adidas.jpg" alt="Image 1" class="carousel-image">
            <img src="img/futsal1.jpg" alt="Image 2" class="carousel-image">
            <img src="img/sports.jpg" alt="Image 3" class="carousel-image">
        </div>
    </div>
    
    <button type="button" class="btn btn-success float-end custom-margin-right">Success</button>
    <h4>List Barang</h4>

    <div class="row">
        @foreach($barangs as $barang)
            <div class="col-md-4 mb-4">
                <div class="card" style="width: 18rem;">
                    <img src="{{ url('storage/uploads/'.$barang->gambar) }}"  class="card-img-top" alt="{{ $barang->nama }}">
                    <div class="card-body">
                        <h5 class="card-title">{{ $barang->nama }}</h5>
                        <p class="card-text">{{ $barang->merek }}</p>
                       
                        <p class="card-text">Harga: RP. {{ $barang->harga }}</p>
                        <a href="{{ route('barang.show', $barang->id) }}" class="btn btn-primary">Detail</a>
                    </div>
                </div>
            </div>
        @endforeach
    </div>
</div>

<script src="{{ asset('js/app.js') }}"></script>
<script src="{{ asset('js/carousel.js') }}"></script>
@yield('container')

@include('bagian.footer')
