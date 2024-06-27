@extends('layouts.app')

@section('content')
<link href="{{ asset('css/candidateDetails.css') }}" rel="stylesheet">
@include('components.header')

{{-- @include('components.footer') --}}
<div class="container title text-center">
    <h2>Paslon Nomor 1</h2>
</div>

<div class="back container">
    <p><a href="{{ route('candidate') }}" style="text-decoration: none; color: black;">< Kandidat Lainnya</a></p>
</div>

{{-- Details --}}
<div class="container details-wrapper">
    <div class="row">
        <div class="col-md-5">
            <div>
                <div class="img-wrapper">
                    <img src="{{ asset('images/person.png') }}" alt="">
                </div>
                <h3>Nama Calon Ketua</h3>
                <p>Jabatan Terakhir</p>
            </div>
        </div>
        <div class="col-md-7">
            <div class="details-background-box">
                <div class="d-flex">
                    <div class="me-3">
                        <img width="20px" src="{{ asset('images/searchicon.png') }}" alt="">
                    </div>
                    <h4>Latar Belakang</h4>
                </div>
                <p>Lorem, ipsum dolor sit amet consectetur adipisicing elit. Soluta maxime totam quidem esse vitae laudantium, inventore repellat asperiores? Et quo ullam qui ut alias voluptates delectus repudiandae consectetur laborum facilis quidem eius hic cumque vero obcaecati unde animi, aliquid voluptatem ducimus, beatae, reiciendis temporibus nulla? Illum optio aspernatur adipisci aut corporis, laudantium possimus, ut iste, dolorem numquam eius. Dolor animi et illum possimus in culpa placeat unde non explicabo expedita nihil obcaecati sapiente, alias omnis est aperiam sint voluptas quaerat? Tempora laudantium tempore saepe dolorem at. Ipsam aspernatur aliquid sequi blanditiis, tempora, aut odio quis cum nulla, atque asperiores ex impedit....</p>
                <button class="btn" style="background-color: #FFE500;" data-bs-toggle="modal" data-bs-target="#backgroundModal">Selengkapnya</button>
            </div>
        </div>
    </div>
</div>
<div class="container details-wrapper">
    <div class="row">
        <div class="col-md-5">
            <div>
                <div class="img-wrapper">
                    <img src="{{ asset('images/person.png') }}" alt="">
                </div>
                <h3>Nama Calon Wakil Ketua</h3>
                <p>Jabatan Terakhir</p>
            </div>
        </div>
        <div class="col-md-7">
            <div class="details-background-box">
                <div class="d-flex">
                    <div class="me-3">
                        <img width="20px" src="{{ asset('images/searchicon.png') }}" alt="">
                    </div>
                    <h4>Latar Belakang</h4>
                </div>
                <p>Lorem, ipsum dolor sit amet consectetur adipisicing elit. Soluta maxime totam quidem esse vitae laudantium, inventore repellat asperiores? Et quo ullam qui ut alias voluptates delectus repudiandae consectetur laborum facilis quidem eius hic cumque vero obcaecati unde animi, aliquid voluptatem ducimus, beatae, reiciendis temporibus nulla? Illum optio aspernatur adipisci aut corporis, laudantium possimus, ut iste, dolorem numquam eius. Dolor animi et illum possimus in culpa placeat unde non explicabo expedita nihil obcaecati sapiente, alias omnis est aperiam sint voluptas quaerat? Tempora laudantium tempore saepe dolorem at. Ipsam aspernatur aliquid sequi blanditiis, tempora, aut odio quis cum nulla, atque asperiores ex impedit....</p>
                <button class="btn" style="background-color: #FFE500;" data-bs-toggle="modal" data-bs-target="#backgroundModal">Selengkapnya</button>
            </div>
        </div>
    </div>
</div>

{{-- Modal --}}
<div class="modal fade" id="backgroundModal" tabindex="-1" aria-labelledby="backgroundModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-dialog-scrollable" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="backgroundModalLabel">Latar Belakang Paslon</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
                <p>Lorem ipsum dolor sit amet consectetur adipisicing elit. Dolore alias laudantium aliquam cum excepturi distinctio, magnam maxime placeat sit corporis ipsa sunt rem magni dolorem. Laboriosam, pariatur? Tempore temporibus est neque qui beatae ratione perspiciatis nostrum praesentium nesciunt expedita incidunt blanditiis dolores sequi ipsa dolorum voluptate, debitis, nisi amet voluptatibus officia repellat. Ipsum sint in magni illo impedit dignissimos, vero, aliquid distinctio reiciendis expedita unde soluta, vel fuga aut odit enim praesentium! Soluta reprehenderit voluptatum facere esse natus earum consequuntur minima nostrum eaque quam, sapiente perspiciatis unde blanditiis iure eius! Maiores nisi facilis impedit consectetur sunt quasi nesciunt ducimus, temporibus et? Accusamus consectetur vitae voluptatem ut harum dolorem voluptas. Obcaecati debitis, quidem qui quam harum doloremque maiores cumque voluptatem sequi modi optio libero velit consequuntur saepe dignissimos ut expedita recusandae molestiae corporis nihil perferendis quod amet molestias rem? Qui, amet aliquam. Accusantium impedit modi temporibus ut debitis ratione, hic unde quibusdam labore, nam recusandae dolores nihil. Maiores voluptates quibusdam veritatis obcaecati consectetur asperiores in repellat autem velit, hic sint sit libero tempore maxime quasi. Sapiente dolorum asperiores neque, iure sint eius at nostrum dignissimos tenetur veritatis dolores expedita perferendis in accusamus nemo voluptate veniam voluptatibus iusto ipsum, error temporibus reprehenderit.</p>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Tutup</button>
            </div>
        </div>
    </div>
</div>

{{-- Isu Details --}}
{{-- Isu --}}
    <div class="container issue-candidate-wrapper">
        <div class="row justify-content-center text-center">
            <div class="col-md-6">
                <div class="row">
                    <div class="">
                        <img src="{{ asset('images/person.png') }}" alt="">
                        <img src="{{ asset('images/person.png') }}" alt="">
                    </div>
                </div>
                <h4>Pelajari Tanggapan Isu Dari Paslon Ini!!!</h4>
                <a href="{{ route('issues') }}" class="btn" style="background-color: #FFE500;">PELAJARI</a>
            </div>
        </div>
    </div>

    @include('components.footer')


<script src="{{ asset('js/script.js') }}"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/gsap/3.10.4/gsap.min.js"></script>
<script src="{{ asset('js/animations.js') }}"></script>

@endsection
