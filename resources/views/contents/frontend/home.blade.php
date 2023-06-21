@extends('layouts.frontend')
@section('content')
<!-- promosi -->
{{-- <div class="promosi pt-3 pb-3">
    <div class="container text-center blink_me">
        HIJUB GREAT DEALS 12.12, Get Extra Disc. Rp120.000,- Min. Purchase Rp200.000,-. Kode GS-120
    </div>
</div> --}}
<!-- end promosi -->
<!-- carausel -->
<div id="carouselId" class="carousel slide" data-bs-ride="carousel">
    {{-- <ol class="carousel-indicators">
        <li data-bs-target="#carouselId" data-bs-slide-to="0" class="active"></li>
        <li data-bs-target="#carouselId" data-bs-slide-to="1"></li>
    </ol> --}}
    <div class="carousel-inner" role="listbox">
        <div class="carousel-item active">
            <img src="{{asset('assets/img/100.jpg')}}" class="img-fluid w-100" id="gambar_slider" alt="First slide">
        </div>
        <div class="carousel-item">
            <img src="{{asset('assets/img/101.jpeg')}}" class="img-fluid w-100" id="gambar_slider" alt="Second slide">
        </div>
    </div>
    <button class="carousel-control-prev" type="button" data-bs-target="#carouselId" data-bs-slide="prev">
        <span class="carousel-control-prev-icon" aria-hidden="true"></span>
        <span class="visually-hidden">Previous</span>
    </button>
    <button class="carousel-control-next" type="button" data-bs-target="#carouselId" data-bs-slide="next">
        <span class="carousel-control-next-icon" aria-hidden="true"></span>
        <span class="visually-hidden">Next</span>
    </button>
</div>
<div class="container" align="center">
    <section id="tentang">
      <div class="container reveal" style="padding-top: 50px;">
        <div class="row" style="padding-top: 30px;">
          <h4><b>Pakraman Widya Santika</b></h4>
          <div class="col" style="padding-top: 20px;">
            <p align="justify" style="margin-top: 20px;">Pakraman Widya Santika atau yang disingkat PAWISA PNB adalah Suatu wadah yang menghimpun mahasiswa hindu di Politeknik Negeri Bali (PNB) yang berlandaskan Tri Hita Karana dengan bedasarkan kekeluargaan. Pakraman Widya Santika (PAWISA) memiliki 3 Baga yang dimana 3 baga itu diambil dari bagian Tri Hita Karana yaitu, Baga Parahyangan, Baga Palemahan, dan Baga Pawongan.</p>
          </div>
          <div class="col" style="padding-top: 10px;">
            <img src="{{asset('assets/img/7.png')}}" alt="4" width="350" height="200">
          </div>
        </div>
      </div>
    </section>
  </div>
   <div class="container" style="padding-top: 30px;" align="center">
    <style type="text/css">
      .img-hover-zoom {
        width: 100%;
        max-width: 500px;
        overflow: hidden;
        margin-bottom: 20px;
      }

      .img-hover-zoom img {
        transition: transform .2s ease;
        object-fit: cover;
        width: 100%;
        max-width: 500px;

      }

      .img-hover-zoom:hover img {
        transform: scale(1.1);
      }
    </style>
    <section id="galeri">
      <div class="container reveal fade-left" style="padding-top: 100px;">
        <div class="gallery">
          <h4><b>Galeri</b></h4>
          <div class="row justify-content-center" style="padding-top: 20px;">

            <div class="col-4">

              <div class="img-hover-zoom">
                <img src="{{asset('assets/img/11.jpg')}}" class="d-block w-100" alt="6">
              </div>
            </div>
            <div class="col-4">
              <div class="img-hover-zoom">
                <img src="{{asset('assets/img/12.jpg')}}" class="d-block w-100" alt="6">
              </div>
            </div>
            <div class="col-4">
              <div class="img-hover-zoom">
                <img src="{{asset('assets/img/13.jpg')}}" class="d-block w-100" alt="6">
              </div>
            </div>
            <div class="col-4" style="padding-top: 10px;">
              <div class="img-hover-zoom">
                <img src="{{asset('assets/img/14.jpg')}}" class="d-block w-100" alt="6">
              </div>
            </div>
            <div class="col-4" style="padding-top: 10px;">

              <div class="img-hover-zoom">
                <img src="{{asset('assets/img/15.jpg')}}" class="d-block w-100" alt="6">
              </div>
            </div>
            <div class="col-4" style="padding-top: 10px;">
              <div class="img-hover-zoom">
                <img src="{{asset('assets/img/16.jpg')}}" class="d-block w-100" alt="6">
              </div>
            </div>
          </div>
        </div>
      </div>
    </section>
  </div>
  <section id="pengurusinti">
    <div class="container reveal fade-right" style="padding-top: 100px;">
      <div class="container" style="padding-top: 30px;" align="center">
        <h4><b>Pengurus Inti PAWISA</b></h4>

        <div class="row justify-content-center" style="padding-top: 20px;">
          @foreach ($jabatan as $item)
            <div class="col" style="padding:10px;">
              <div class="card" style="width: 18rem; box-shadow:2px 2px 2px 2px #888888;">
                <img src="{{$item->gambar}}" class="card-img-top" alt="{{$item->gambar}}">
                <div class="card-body">
                  <p class="card-text" align="center">{{$item->nama}}</p>
                  <p class="card-text" align="center"><b>{{$item->kategori}}</b></p>
                </div>
              </div>
            </div>
          @endforeach

          {{-- <div class="col" style="padding:10px;">
            <div class="card" style="width: 18rem; box-shadow:2px 2px 2px 2px #888888;">
              <img src="{{asset('assets/img/11.png')}}" class="card-img-top" alt="...">
              <div class="card-body">
                <p class="card-text" align="center">ALDI</p>
                <p class="card-text" align="center"><b>Ketua</b></p>
              </div>
            </div>
          </div> --}}

          {{-- <div class="col" style="padding:10px;">
            <div class="card" style="width: 18rem; box-shadow:2px 2px 2px 2px #888888;">
              <img src="{{asset('assets/img/40.jpg')}}" class="card-img-top" alt="...">
              <div class="card-body">
                <p class="card-text" align="center">NADYA</p>
                <p class="card-text" align="center"><b>Wakil Ketua</b></p>
              </div>
            </div>
          </div> --}}

          {{-- <div class="col" style="padding:10px;">
            <div class="card" style="width: 18rem; box-shadow:2px 2px 2px 2px #888888;">
              <img src="{{asset('assets/img/42.jpg')}}" class="card-img-top" alt="...">
              <div class="card-body">
                <p class="card-text" align="center">SINTYA</p>
                <p class="card-text" align="center"><b>Sekretaris Umum</b></p>
              </div>
            </div>
          </div> --}}

          {{-- <div class="col" style="padding-top: 20px; ">
            <div class="card" style="width: 18rem; box-shadow:2px 2px 2px 2px #888888;">
              <img src="{{asset('assets/img/41.jpg')}}" class="card-img-top" alt="...">
              <div class="card-body">
                <p class="card-text" align="center">RINA</p>
                <p class="card-text" align="center"><b>Bendahara Umum</b></p>
              </div>
            </div>
          </div> --}}

          {{-- <div class="col" style="padding-top: 20px;">
            <div class="card" style="width: 18rem; box-shadow:2px 2px 2px 2px #888888;">
              <img src="{{asset('assets/img/44.jpg')}}" class="card-img-top" alt="...">
              <div class="card-body">
                <p class="card-text" align="center">VIERA</p>
                <p class="card-text" align="center"><b>Wakil Sekretaris</b></p>
              </div>
            </div>
          </div> --}}

          {{-- <div class="col" style="padding-top: 20px;">
            <div class="card" style="width: 18rem; box-shadow:2px 2px 2px 2px #888888;">
              <img src="{{asset('assets/img/43.jpg')}}" class="card-img-top" alt="...">
              <div class="card-body">
                <p class="card-text" align="center">INTAN</p>
                <p class="card-text" align="center"><b>Wakil Bendahara</b></p>
              </div>
            </div>
          </div> --}}

        </div>
      </div>
    </div>
    </section>
      <div class="container" style="padding-top: 30px;" align="center">
      <section id="bagapawisa">
        <div class="container reveal fade-top" style="padding-top: 90px;">
          <h4><b>BAGA PAWISA</b></h4>
          <div class="row justify-content-center" style="padding-top: 20px;">

            <div class="col" style="padding:10px;">
              <div class="card" style="width: 18rem; border-color:black;">
                <img src="{{asset('assets/img/18.jpg')}}" class="card-img-top" alt="...">
                <div class="card-body">
                  <h5 class="card-title" align="center">Baga Parahyangan</h5>
                  <p class="card-text" align="justify">Parahyangan merupakan hubungan yang terjalin antara Manusia dengan Tuhan. Manusia adalah ciptaan Tuhan, yang di dalam tubuh seseorang terdapat atman yang merupakan percikan sinar suci kebesaran Tuhan.</p>
                  <a href="{{route('register.anggota.baga',['baga'=>'parahyangan'])}}" class="btn btn-primary">Daftar BAGA</a>
                </div>
              </div>
            </div>

            <div class="col" style="padding:10px;">
              <div class="card" style="width: 18rem; border-color:black;">
                <img src="{{asset('assets/img/19.jpg')}}" class="card-img-top" alt="...">
                <div class="card-body">
                  <h5 class="card-title" align="center">Baga Palemahan</h5>
                  <p class="card-text" align="justify">Palemahan di mana merupakan hubungan yang terjalin antara Manusia dengan alam lingkungan di sekitarnya. Hubungan manusia dengan alam dapat tercipta dengan lingkungan yang mencakup tumbuhan, hewan, dll.</p>
                  <a href="{{route('register.anggota.baga',['baga'=>'palemahan'])}}" class="btn btn-primary">Daftar BAGA</a>
                </div>
              </div>
            </div>

            <div class="col" style="padding:10px;">
              <div class="card" style="width: 18rem; border-color:black;">
                <img src="{{asset('assets/img/20.jpg')}}" class="card-img-top" alt="...">
                <div class="card-body">
                  <h5 class="card-title" align="center">Baga Pawongan</h5>
                  <p class="card-text" align="justify">Pawongan merupakan hubungan yang terjalin antara manusia dengan sesamanya. Manusia adalah makhluk sosial, manusia juga harus menjaga hubungan keharmonisan dengan keluarga, teman, dan orang disekitarnya.</p>
                  <a href="{{route('register.anggota.baga',['baga'=>'pawongan'])}}" class="btn btn-primary">Daftar BAGA</a>
                </div>
              </div>
            </div>
          </div>
        </div>
      </section>

      <section id="rapat">
        <div class="container reveal fade-top" style="padding-top: 90px;">
          <h4><b>Rapat</b></h4>
          <div class="row justify-content-center" style="padding-top: 20px;">

            @foreach ($rapat as $item)
              <div class="col" style="padding:10px;">
                <div class="card" style="width: 18rem; border-color:black;">
                  <div class="card-body">
                    <h5 class="card-title" align="center">{{$item->nama_rapat}}</h5>
                    <p class="card-text" align="justify">TANGGAL MULAI: {{$item->mulai_rapat}}</p>
                    
                    {{-- <p class="card-text" align="justify">TANGGAL SELESAI: {{$item->selesai_rapat}}</p> --}}
                    
                    <p class="card-text" align="justify">url/kode : {{$item->kode}}</p>
                    <a href="{{$item->kode}}" class="btn btn-primary">bergabung</a>
                  </div>
                </div>
              </div>
            @endforeach
          
          </div>
        </div>
      </section>

      <section id="pengumuman">
        <div class="container reveal fade-top" style="padding-top: 90px;">
          <h4><b>Pengumuman</b></h4>
          <div class="row justify-content-center" style="padding-top: 20px;">

            @foreach ($agenda as $item)
              <div class="col-lg-6" style="padding:10px;">
                <div class="card">
                  <img src="{{$item->gambar}}" class="card-img-top" alt="...">
                  <div class="card-body">
                    <h5 class="card-title" align="center">{{$item->nama}}</h5>
                    <p class="card-text" align="justify">TANGGAL MULAI: {{$item->tgl_kegiatan}}</p>
                    
                    {{-- <p class="card-text" align="justify">TANGGAL SELESAI: {{$item->selesai_rapat}}</p> --}}
                    <p class="card-text" align="justify">kategori : {{$item->kategori->nama_kategori}}</p>
                    <p class="card-text" align="justify">Jenis kegiatan : {{$item->jenis_kegiatan}}</p>
                    <a href="{{$item->kode}}" class="btn btn-primary">bergabung</a>
                  </div>
                </div>
              </div>
            @endforeach
          
          </div>
        </div>
      </section>
    </div>
@endsection
@section('javascript')

@endsection