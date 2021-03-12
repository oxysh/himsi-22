@extends('template.bootstrap.client')

@section('style')
    <style media="screen">
        .height {
            height: 90vh;
        }

        .main {
            background: #E0E8F7;
            padding-top: 40px;
            padding-bottom: 40px;
        }
        img.img-thumb {
            height: 150px;
            width: 150px;
        }

        .active {
            color: #15a4c8 !important;
        }

        .img-software {
            width: 175px;
        }

        @media screen and (max-width: 600px) {
            .height {
                height: auto;
            }

            .menu a img {
                height: auto;
                width: 100%;
            }

            .menu a h5 {
                font-size: 15px;
            }

            .img-software {
                width: 110% !important;
                height: auto;
            }
        }

    </style>
@endsection

@section('content')
        <div class="container">
            <div class="row my-4">
                <div class="col-4">
                    <a class="align-items-center" href="https://drive.google.com/open?id=1WOEJ530ZbAD1T_jsfvxZ06zhctKRaRdA">
                        <img class="img-thumb" src="{{ url('assets/image/academic/academic3.png') }}" alt="">
                        <h5>SKRIPSI</h5>
                    </a>
                </div>
                <div class="col-4">
                    <a class="align-items-center" href="https://drive.google.com/open?id=1JhWRoatAJO5qRjnLsOA43ltT6SY0o9k4" target="_blank">
                        <img class="img-thumb" src="{{ url('assets/image/academic/academic2.png') }}" alt="">
                        <h5>BANK SOAL</h5>
                    </a>
                </div>
                <div class="col-4">
                    <a class="align-items-center" href="https://drive.google.com/open?id=1izNNCMH2o11yV2-4F74ryRskWhGeuJAV" target="_blank">
                        <img class="img-thumb" src="{{ url('assets/image/academic/academic4.png') }}" alt="">
                        <h5>PKM</h5>
                    </a>
                </div>
            </div>
            <div class="row my-4">
                <div class="col-4 menu">
                    <a class="align-items-center" href="https://drive.google.com/open?id=1sYrAn-M1V9n6BpZr3dKPEZU6elng3cTf">
                        <img class="img-thumb" src="{{ url('assets/image/academic/academic1.png') }}" alt="">
                        <h5>BANK MATERI</h5>
                    </a>
                </div>
                <div class="col-4 menu">
                    <a class="align-items-center" href="https://drive.google.com/drive/folders/1RI4miI-ZaJO4yjt8IMK8LlzMR0p7nqJL?usp=sharing"
                        target="_blank">
                        <img class="img-thumb img-software" src="{{ url('assets/image/academic/academic5.png') }}" alt="">
                        <h5>SOFTWARE TOOLS</h5>
                    </a>
                </div>
            </div>
        </div>
@endsection
