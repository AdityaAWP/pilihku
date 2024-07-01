@extends('layouts.admin')
@push('style')
    <style>
        .container-countdown {
            color: #333;
            margin: 0 auto;
            text-align: center;
        }

        .container-countdown h4 {
            font-weight: normal;
            letter-spacing: .125rem;
            text-transform: uppercase;
        }

        .container-countdown li {
            display: inline-block;
            font-size: 1em;
            list-style-type: none;
            padding: .5em;
            text-transform: uppercase;
        }

        .container-countdown li span {
            display: block;
            font-size: 2rem;
        }
    </style>
@endpush

@section('content')
    <div class="row">
        <div class="col-sm-8">
            <div class="card p-4">
                @if (!isset($votingSession))
                    <div class="text-center">
                        <div>Anda belum membuat sesi voting</div>
                        <a href="{{ route('admin.voting-sessions.create', $organization->slug) }}" type="button" class="btn btn-primary mt-3">Buat Sesi Voting</a>
                    </div>
                @else
                    <div class="card-header">
                        <h1 class="text-center">{{ $votingSession->title }}</h1>
                        <div class="text-justify" style="color: #a2a1a1 !important;">{!! nl2br($votingSession->description) !!}</div>
                    </div>
                @endif
            </div>
        </div>
        <div class="col-md-4">
            <div class="card p-4">
                <div class="container-countdown">
                        <h5 id="headline">Countdown</h5>
                        <div id="button-container"></div>
                        <div id="countdown">
                            <ul>
                                <li><span id="days"></span>days</li>
                                <li><span id="hours"></span>Hours</li>
                                <li><span id="minutes"></span>Minutes</li>
                                <li><span id="seconds"></span>Seconds</li>
                            </ul>
                        </div>
                </div>
            </div>

            <div class="card px-4 pt-4">
                <div class="d-flex justify-content-center my-3">
                    <div>
                        <div class="text-center">
                            <img style="max-width: 200px; max-height: 200px;" src="{{ asset('storage/logo/' . $organization->logo) }}" alt="logo">
                            <h4 class="mt-2">{{ $organization->name }}</h4>
                            <span class="text-secondary"><i width="5px;" class="fa fa-users"></i> {{ $memberCount }} anggota</span>
                        </div>
                        <p class="text-justify" style="color: #a2a1a1;">{!! nl2br($organization->bio) !!}</p>
                    </div>
                </div>
            </div>
        </div>

    </div>
@endsection

@push('script')
    <script>
            (function() {
                const second = 1000,
                    minute = second * 60,
                    hour = minute * 60,
                    day = hour * 24;

                //I'm adding this section so I don't have to keep updating this pen every year :-)
                //remove this if you don't need it
                let today = new Date(),
                    dd = String(today.getDate()).padStart(2, "0"),
                    mm = String(today.getMonth() + 1).padStart(2, "0"),
                    yyyy = today.getFullYear()

                today = mm + "/" + dd + "/" + yyyy;

                // let voteDate = "07/03/2024 20:00:00";
                let voteDate = "{{ date('m/d/Y H:i:s', strtotime($votingSession->voting_start)) }}"

                const countDown = new Date(voteDate).getTime(),
                    x = setInterval(function() {

                        const now = new Date().getTime(),
                            distance = countDown - now;

                        document.getElementById("days").innerText = Math.floor(distance / (day)),
                            document.getElementById("hours").innerText = Math.floor((distance % (day)) / (hour)),
                            document.getElementById("minutes").innerText = Math.floor((distance % (hour)) / (minute)),
                            document.getElementById("seconds").innerText = Math.floor((distance % (minute)) / second);

                        //do something later when date is reached
                        if (distance < 0) {
                            document.getElementById("headline").innerText = "Pemilihan telah dimulai";
                            document.getElementById("button-container").innerHTML = `<a href="{{ route('admin.dashboard', $organization->slug) }}" type="button" class="btn btn-primary mt-3">Cek Hasil</a>`;
                            
                            document.getElementById("countdown").style.display = "none";
                            clearInterval(x);
                        }
                        //seconds
                    }, 0)
            }());
    </script>
@endpush
