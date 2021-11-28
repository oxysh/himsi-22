@extends('template.cakrawala.client.template')

@section('title')
    Curhat
@endsection

@section('extracss')
    <link rel="stylesheet" href="{{ url('assets/css/chsi-landing.css') }}">
@endsection

@section('content')
    <div class="inner-content">
        <div class="main-content">
            <h2>Sesi <span class="orange">Curhat</span></h2>
            <span class="p">CURAHKAN ISI HATI TERDALAM KALIAN, KAMI SELALU ADA UNTUK MENJADI PENDENGAR ATAU
                BAHKAN MEMBERI JALAN KELUAR JIKA DIBUTUHKAN. JANGAN KHAWATIR DENGAN IDENTITAS KALIAN, KAMI PASTIKAN TERJAGA.
                YUK NGOBROL!?</span>
            <form action="{{ route('curhat.submit') }}" class="box-content" method="POST">
                @csrf
                <span class="box-label">
                    Isi Curhatanmu
                </span>

                <textarea name="chat" id="" rows="6"></textarea>

                <span class="box-label" style="margin-top: 14px;">Ingin mendapatkan respon ?</span>
                <div class="form-group">
                    <label for="tanggapan">Ya, Aku mau</label>
                    <input type="checkbox" name="respon" id="tanggapan" placeholder="ya aku mau">
                </div>

                <button type="submit" class="btn-primary"><strong>Kirim Curhatan</strong></button>
            </form>

            <div class="hr-break">
                <hr>
                <span>atau</span>
            </div>

            <form method="POST" action="{{ route('curhat.find') }}" class="cek-curhatan">
                @csrf
                <span class="h4">
                    Cek curhatan sebelumnya
                </span>
                <input name="token" type="text" class="form-control" placeholder="Masukkan Token">
                <button type="submit" id="cari-curhat" class="btn-primary"><img
                        src="https://img.icons8.com/material-outlined/50/000000/search.png" /
                        style="height: 25px; width: 25px; filter: invert(1);"></button>
            </form>
        </div>
        <img src="{{ url('assets/image/chsiLanding.png') }}" alt="" id="sini-curhat">
    </div>
@endsection

@section('extrajs')
    <script src="{{ url('assets/js/form-list.js') }}"></script>
    <script>
        document.querySelector('#nav-chsi').classList.add('selected');
    </script>
@endsection

@section('extrajs')
    <script src="{{ url('assets/js/form-list.js') }}"></script>
    <script>
        document.querySelector('#nav-chsi').classList.add('selected');
    </script>
@endsection
