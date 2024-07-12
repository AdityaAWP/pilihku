@extends('layouts.app')

@section('content')
<link href="{{ asset('css/home.css') }}" rel="stylesheet">

<div class="d-flex flex-column min-vh-100 position-relative">
    @include('components.header')
    
    {{-- Jumbotron --}}
    <section class="container jumbotron">
        <div class="row justify-content-center align-items-center">
            <div class="col-md-4 imageWrapper">
                <img src="{{ asset('images/cartoon-dump.png') }}" alt="">
            </div>
            <div class="col-md-6 title" >
                <h1>PilihKu, <span> Pilihan Amanmu!</span> </h1>
            </div>
        </div>
        <div class="row sloganBox justify-content-center align-items-center">
            <div class="col-md-3 sloganImage">
                <img src="{{ asset('images/Logo.png') }}" alt="">
            </div>
            <div class="col-md-8 sloganText">
                <h3>Sebagai seorang pemilih, kita memiliki andil yang besar
                    untuk menentukan masa depan</h3>
                <p>Website ini menyediakan informasi seputar isu, dan kandidat Calon Pemimpin yang relevan 
                    untuk membuat keputusan di Pemilihan.</p>
            </div>
        </div>
    </section>
    {{-- End Jumbotron --}}

    {{-- Organization --}}

    <section class="container organization">
        <h1 style="text-align: center" class="title">ORGANISASI</h1>
        <div class="organization-content">
            <div class="imageWrapper">
                <img src="{{ asset('images/hmti.png') }}" alt="">
            </div>
            <div class="contentWrapper">
                <h1 class="organizationName">HMTI</h1>
                <p id="organizationDescription">Himpunan Mahasiswa Teknik Informatika (HMTI) Universitas Dian Nuswantoro (Udinus) adalah sebuah organisasi mahasiswa yang berkomitmen untuk membangun dan mengembangkan potensi mahasiswa Teknik Informatika. Berdiri sejak tahun [tahun berdiri], HMTI Udinus telah menjadi wadah bagi mahasiswa untuk berinteraksi, belajar, dan berkarya dalam bidang teknologi informasi dan komputer. Sebagai organisasi yang dinamis, HMTI Udinus memiliki berbagai program dan kegiatan yang bertujuan untuk mengembangkan kemampuan akademik dan non-akademik anggotanya. Kegiatan yang rutin diadakan meliputi seminar, workshop, dan pelatihan yang mendalam tentang topik-topik terkini di dunia teknologi, seperti pengembangan perangkat lunak, keamanan siber, kecerdasan buatan, dan teknologi jaringan. Selain itu, HMTI juga aktif dalam mengadakan kompetisi internal dan eksternal, seperti lomba pemrograman, hackathon, dan berbagai event lainnya yang mengasah keterampilan teknis dan kreatif mahasiswa. Selain fokus pada aspek akademik, HMTI Udinus juga sangat memperhatikan pengembangan soft skills anggotanya. Melalui kegiatan-kegiatan seperti team building, outbound, dan kegiatan sosial, HMTI berusaha untuk membentuk karakter mahasiswa yang tangguh, komunikatif, dan memiliki jiwa kepemimpinan yang kuat. Kegiatan sosial yang dilakukan HMTI, seperti bakti sosial dan kampanye lingkungan, juga menunjukkan kepedulian dan kontribusi mereka terhadap masyarakat sekitar.</p>
                <span class="show-more" id="showMoreButton" data-bs-toggle="modal" data-bs-target="#organizationModal">Selengkapnya</span>
            </div>
        </div>
    </section>
    
    <!-- Modal -->
    <div class="modal fade" id="organizationModal" tabindex="-1" aria-labelledby="organizationModalLabel" aria-hidden="true">
      <div class="modal-dialog">
        <div class="modal-content">
          <div class="modal-header">
            <h5 class="modal-title" id="organizationModalLabel">HMTI</h5>
            <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
          </div>
          <div class="modal-body">
            Himpunan Mahasiswa Teknik Informatika (HMTI) Universitas Dian Nuswantoro (Udinus) adalah sebuah organisasi mahasiswa yang berkomitmen untuk membangun dan mengembangkan potensi mahasiswa Teknik Informatika. Berdiri sejak tahun [tahun berdiri], HMTI Udinus telah menjadi wadah bagi mahasiswa untuk berinteraksi, belajar, dan berkarya dalam bidang teknologi informasi dan komputer. Sebagai organisasi yang dinamis, HMTI Udinus memiliki berbagai program dan kegiatan yang bertujuan untuk mengembangkan kemampuan akademik dan non-akademik anggotanya. Kegiatan yang rutin diadakan meliputi seminar, workshop, dan pelatihan yang mendalam tentang topik-topik terkini di dunia teknologi, seperti pengembangan perangkat lunak, keamanan siber, kecerdasan buatan, dan teknologi jaringan. Selain itu, HMTI juga aktif dalam mengadakan kompetisi internal dan eksternal, seperti lomba pemrograman, hackathon, dan berbagai event lainnya yang mengasah keterampilan teknis dan kreatif mahasiswa. Selain fokus pada aspek akademik, HMTI Udinus juga sangat memperhatikan pengembangan soft skills anggotanya. Melalui kegiatan-kegiatan seperti team building, outbound, dan kegiatan sosial, HMTI berusaha untuk membentuk karakter mahasiswa yang tangguh, komunikatif, dan memiliki jiwa kepemimpinan yang kuat. Kegiatan sosial yang dilakukan HMTI, seperti bakti sosial dan kampanye lingkungan, juga menunjukkan kepedulian dan kontribusi mereka terhadap masyarakat sekitar.
          </div>
          <div class="modal-footer">
            <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
          </div>
        </div>
      </div>
    </div>
    
    {{-- End Organization --}}

    {{-- Rekam Jejak --}}
    <section class="container rekamJejak">
        <div class="title">
            <h1>Pelajari <span>rekam jejak & tanggapan isu </span>kandidat 👀</h1>
            <p class="desc">Pemilih memainkan peran sentral dalam pemilihan,
                sehingga penting untuk memahami latar belakang, tanggapan isu, dan visi misi para kandidat.</p>
            <a href="{{ route('candidate') }}" class="btn">Lihat Profil Kandidat</a>
            <div class="candidates">
                @foreach ($candidates as $candidate)
                <div class="imageWrapper">
                    <img src="{{ asset("storage/candidates/".$candidate->photo)  }}" alt="Candidate {{ $candidate->id }}" class="img-fluid">
                    <p>{{ $candidate->name }}</p>
                </div>
                @endforeach
            </div>
        </div>
    </section>
    {{-- End Rekam Jejak --}}

    {{-- Quiz --}}
    <section class="container quiz">
        <div class="title1">
            <h1>COBA!!!</h1>
        </div>
        <div class="title2">
            <h1>QUIZ KANDIDAT</h1>
        </div>
        <h4>Ayo coba quiz untuk mengetahui gagasan kandidat mana yang paling cocok dengan kamu!!!</h4>
        <a href="" class="btn">Mulai Sekarang</a>
    </section>
    {{-- End Quiz --}}
    
    {{-- Voting --}}
    <section class="container voting" style="background-image: url('{{ asset('images/bg-voting.png')}}'); background-size: cover; background-position: center;">
        <div class="row justify-content-center align-items-center">
            <div class="col-md-7 title">
                <h1>VOTING KANDIDAT PILIHANMU!</h1>
                <a href="{{ route('voting') }}" class="btn">Voting Sekarang</a>
            </div>
            <div class="col-md-4">
                <img src="{{ asset('images/cartoon-1.png') }}" alt="">
            </div>
        </div>
    </section>
    {{-- End Voting --}}
</div>

@include('components.footer')
<script src="{{ asset('js/script.js') }}"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/gsap/3.10.4/gsap.min.js"></script>
<script src="{{ asset('js/animations.js') }}"></script>
@endsection
