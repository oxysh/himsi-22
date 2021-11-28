@extends('template.cakrawala.client.template')

@section('title')
    Kritik Saran HIMSI
@endsection

@section('extracss')
    <link rel="stylesheet" href="{{ url('assets/css/krisar-index.css') }}" />
@endsection

@section('content')
    <div class="head">
        <div class="text">
            <h1>Kritik <span id="orange">dan</span> Saran</h1>
            <span>Anda dapat memberikan kritik dan saran kepada kami melalui 
            fitur ini. Pilih bidang atau pihak yang ingin Anda kritisi, 
            kemudian tuliskan kritik dan saran Anda disana. Kami akan berusaha 
            untuk menindak lanjuti kritik dan saran Anda!</span>
        </div>
        <img src="{{url('assets/img/krisar-msg.png')}}" id="krisar-msg-img" alt="" srcset="" />
    </div>
    <div class="list">
        <h1>List Bidang (12)</h1>
        <div class="list-item">
            <div class="thumb-item" data-bidang="psdm">
                <div class="outline">
                    <img src="https://source.unsplash.com/400x400/?nature,water" alt="" />
                    <span>PSDM</span>
                </div>
            </div>
            <div class="thumb-item" data-bidang="ristek">
                <div class="outline">
                    <img src="https://source.unsplash.com/401x401/?nature,water" alt="" />
                    <span>RISTEK</span>
                </div>
            </div>
            <div class="thumb-item" data-bidang="sera">
                <div class="outline">
                    <img src="https://source.unsplash.com/402x402/?nature,water" alt="" />
                    <span>SERA</span>
                </div>
            </div>
            <div class="thumb-item" data-bidang="hublu">
                <div class="outline">
                    <img src="https://source.unsplash.com/403x403/?nature,water" alt="" />
                    <span>HUBLU</span>
                </div>
            </div>
            <div class="thumb-item" data-bidang="akademik">
                <div class="outline">
                    <img src="https://source.unsplash.com/404x404/?nature,water" alt="" />
                    <span>AKADEMIK</span>
                </div>
            </div>
            <div class="thumb-item" data-bidang="kestari">
                <div class="outline">
                    <img src="https://source.unsplash.com/405x405/?nature,water" alt="" />
                    <span>KESTARI</span>
                </div>
            </div>
            <div class="thumb-item" data-bidang="bph">
                <div class="outline">
                    <img src="https://source.unsplash.com/406x406/?nature,water" alt="" />
                    <span>BPH</span>
                </div>
            </div>
            <div class="thumb-item" data-bidang="media">
                <div class="outline">
                    <img src="https://source.unsplash.com/407x407/?nature,water" alt="" />
                    <span>MEDIA</span>
                </div>
            </div>
        </div>
    </div>
@endsection

@section('modal')
    <div class="modal" id="info-bidang">
        <div class="close-overlay"></div>
        <div class="modal-content">
            <h1 id="nama-bidang">SERA</h1>
            <span id="desc-bidang">Lorem ipsum dolor sit amet consectetur adipisicing elit. Voluptatibus ducimus totam
                corrupti dolorum, fugiat
                nemo, cumque ratione possimus eaque, ipsum atque qui. Ad dolores dolorem, voluptatum eligendi doloribus
                veritatis unde commodi quod, quo eos distinctio quam architecto sequi molestiae debitis veniam aspernatur.
                Dignissimos ipsum architecto odio, laboriosam ullam quae culpa.</span>
            <button id="button-kritik" class="btn btn-primary" type="button">Kritik dan Saran <img
                    src="{{url('/assets/img/send.svg')}}"></button>
            <h1 style="margin-top: 20px;">List Staf</h1>
            <div class="staf">
                <img src="#" alt="">
                <div class="staf-text">
                    <span class="name">JALI</span>
                    <span class="title">Staff</span>
                </div>
                <div class="angk">2019</div>
            </div>

        </div>
    </div>
    <div class="modal" id="kritik-saran">
        <div class="close-overlay"></div>
        <div class="modal-content">
            <h1>Kritik dan Saran untuk</h1>
            <h1 id="kritik-bidang"></h1>
            <form action="{{ route('kritik.submit') }}" method="post">
                @csrf
                <input type="hidden" name="bidang" id="kritik-nama-bidang" value="">
                <textarea name="krisar" id="" rows="10"></textarea>
                <button type="submit" class="btn btn-primary">Kirim <img src="{{url('assets/img/send.svg')}}" alt=""></button>
            </form>
        </div>
    </div>
@endsection

@section('extrajs')
    <script>
        const yerLink = "{{ url('assets/krisar/') }}" + '/';
    </script>
    <script src="{{ url('assets/js/krisar-data.js') }}"></script>
    <script src="{{ url('assets/js/krisar-index.js') }}"></script>
@endsection
