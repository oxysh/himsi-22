@extends('template.koneksi.template')

@section('title')
    Kritik Saran untuk HIMSI
@endsection
@section('seo-desc', ''){{-- ini buat deskripsi seo --}}
@section('seo-img', '') {{-- ini buat gambar seo --}}

@section('bodyclass', '') {{-- kalo butuh class buat body --}}
@section('container', 'krisar')

@section('content')
    <div class="krisar__title-section">
        <h1 class="midnight-blue">Kritik dan Saran</h1>
        <p>Kami akan menampung aspirasi kinerja yang kalian berikan dalam kritik saran. Pilih bidang yang diinginkan dan
            kami akan menindaklanjutin tanggapan kalian.</p>
    </div>

    <div class="krisar__opsi">
        <div class="krisar__card" data-bidang="bph">
            <img src="{{ url('assets/img/bidang-bph.png') }}" alt="">
            <p class="midnight-blue">Badan Pengurus Harian</p>
        </div>
        <div class="krisar__card" data-bidang="kestari">
            <img src="{{ url('assets/img/bidang-kestari.png') }}" alt="">
            <p class="midnight-blue">Kewirausahaan dan Inventaris</p>
        </div>
        <div class="krisar__card" data-bidang="psdm">
            <img src="{{ url('assets/img/bidang-psdm.png') }}" alt="">
            <p class="midnight-blue">Pengembangan Sumber Daya Mahasiswa</p>
        </div>
        <div class="krisar__card" data-bidang="hublu">
            <img src="{{ url('assets/img/bidang-hublu.png') }}" alt="">
            <p class="midnight-blue">Hubungan Luar</p>
        </div>
        <div class="krisar__card" data-bidang="sera">
            <img src="{{ url('assets/img/bidang-sera.png') }}" alt="">
            <p class="midnight-blue">Seni dan Olahraga</p>
        </div>
        <div class="krisar__card" data-bidang="media">
            <img src="{{ url('assets/img/bidang-media.png') }}" alt="">
            <p class="midnight-blue">Media</p>
        </div>
        <div class="krisar__card" data-bidang="akademik">
            <img src="{{ url('assets/img/bidang-akademik.png') }}" alt="">
            <p class="midnight-blue">Akademik</p>
        </div>
        <div class="krisar__card" data-bidang="ristek">
            <img src="{{ url('assets/img/bidang-ristek.png') }}" alt="">
            <p class="midnight-blue">Riset dan Teknologi</p>
        </div>
    </div>

    {{-- modalss --}}
    <div class="krisar__dialog dialog dialog__card">
        <div class="krisar__dialog-left">
            <div class="krisar__dialog-title-section">
                <img src="{{ url('assets/img/bidang-bph.png') }}" alt="" class="krisar__dialog-img">
                <h3 class="midnight-blue krisar__dialog-title">Badan Pengurus Harian</h3>
            </div>
            <p class="grey krisar__dialog-desc"></p>
        </div>
        <form action="{{ route('kritik.submit') }}" method="post" class="krisar__dialog-right">
            <h4 class="midnight-blue">Kritik dan Saran untuk <span class="krisar__dialog-akronim">BPH</span></h4>

            @csrf
            <input type="hidden" name="bidang" id="kritik-nama-bidang" value="">
            <textarea name="krisar" rows="10" class="form__control-box"></textarea>


            <div class="dialog__btns">
                <button type="button" class="btn-close btn-secondary">Cancel</button>
                <button type="submit" class="btn-primary">Submit</button>
            </div>
        </form>
    </div>

    <div class="dialog__bg"></div>
@endsection

@section('extrajs')
    <script src="{{ url('assets/js/koneksi/kritik-saran.js') }}"></script>
@endsection
