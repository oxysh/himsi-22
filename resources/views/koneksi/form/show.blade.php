@extends('template.koneksi.template')

@section('title', 'Form - Selamat Datang di Form HIMSI')
@section('seo-desc', ''){{-- ini buat deskripsi seo --}}
@section('seo-img', '') {{-- ini buat gambar seo --}}

@section('bodyclass', '') {{-- kalo butuh class buat body --}}
@section('container', 'form-show')

@section('content')
    <div class="form-show__title-section">
        <h2 class="midnight-blue">Edit Form</h2>
        <p>Ubah tampilan dan perbanyak pertanyaan pada form</p>
    </div>

    <div class="form-show__btns">
        <button data-name="tampilan" class="form-show__btn btn-primary">Tampilan</button>
        <button data-name="pertanyaan" class="form-show__btn">Pertanyaan</button>
        <button data-name="jawaban" class="form-show__btn">Jawaban</button>
    </div>

    <div class="form-show__content">
        <div class="form-show__content-body form-show__content-body--tampilan active">
            <div class="form-show__desc">
                <p class="form-show__label form-show__label--author midnight-blue">Author</p>
                <p class="form-show__value form-show__value--author grey">{{ $data->pemilik }}</p>
                <p class="form-show__label form-show__label--judul midnight-blue">Judul</p>
                <p class="form-show__value form-show__value--judul grey">{{ $data->judul }}</p>
                <p class="form-show__label form-show__label--deadline midnight-blue">Batas Pengisian</p>
                <p class="form-show__value form-show__value--deadline grey">{{ $data->deadline }}</p>
                <p class="form-show__label form-show__label--shortlink midnight-blue">Short link</p>
                <p class="form-show__value form-show__value--shortlink grey">himsiunair.com/f/{{ $data->bitly }} <img
                        src="{{ url('assets/img/paste.svg') }}" class="form-show__option-btn"></p>
                <p class="form-show__label form-show__label--deskripsi midnight-blue">Deskripsi</p>
                <p class="form-show__value form-show__value--deskripsi grey">{{ $data->deskripsi }}</p>
                <p class="form-show__label form-show__label--afterform midnight-blue">Afterform</p>
                <p class="form-show__value form-show__value--afterform grey">{{ $data->afterform }}</p>
                <p class="form-show__label form-show__label--afterformlink midnight-blue">Afterform Link</p>
                <p class="form-show__value form-show__value--afterformlink grey">{{ $data->afterformlink }}</p>
            </div>
            <div class="form-show__option-btns">
                <a href="{{ route('f.form.excel', $data->token) }}" class="form-show__option-btn"><img
                        src="{{ url('assets/img/download.svg') }}" alt=""></a>
                <button class="form-show__option-btn" id="formEdit"><img src="{{ url('assets/img/edit.svg') }}"
                        alt=""></button>
                <button class="form-show__option-btn" id="formDelete"><img src="{{ url('assets/img/delete.svg') }}"
                        alt=""></button>
            </div>
        </div>

        <div class="form-show__content-body form-show__content-body--pertanyaan">
            <button class="form-show__urutkan-pertanyaan">Urutkan Pertanyaan</button>
            <table class="form-show__tabel-pertanyaan">
                <thead>
                    <th>No</th>
                    <th>Tipe</th>
                    <th>Pertanyaan</th>
                    <th>Wajib</th>
                    <th></th>
                </thead>
                <tbody>
                    @foreach ($data->pertanyaan as $p)
                        <tr>
                            <td class="form-show__no-pertanyaan">{{ $loop->iteration }}</td>
                            <td>
                                @switch($p->tipe)
                                    @case('text')
                                        Text Pendek
                                    @break

                                    @case('textarea')
                                        Text Panjang
                                    @break

                                    @case('select')
                                        Opsi / Pilihan Ganda
                                    @break

                                    @case('date')
                                        Tanggal
                                    @break

                                    @case('datetime')
                                        Tanggal dan Jam
                                    @break

                                    @case('number')
                                        Angka
                                    @break

                                    @default
                                        {{ $p->tipe }}
                                @endswitch
                            </td>
                            <td>{{ $p->pertanyaan }}</td>
                            <td>{{ $p->mandatory ? 'ya' : 'tidak' }}</td>
                            <td>
                                <span class="form-show__aksi-pertanyaan">
                                    <a href="#" class="form-show__edit-pertanyaan" data-modal="#modal-tambah-pertanyaan"
                                        data-tipe="{{ $p->tipe }}" data-quest="{{ $p->pertanyaan }}"
                                        data-opsi="{{ $p->opsi }}" data-unique="{{ $p->id }}"
                                        data-wajib="{{ $p->mandatory ? '1' : '0' }}"
                                        data-link="{{ route('f.form.pertanyaan.update', [$data->token, $p->id]) }}">
                                        <img src="{{ url('assets/img/edit.svg') }}" alt="">
                                    </a>
                                    <a href="#" class="form-show__delete-pertanyaan">
                                        <img src="{{ url('assets/img/delete.svg') }}" alt="">
                                    </a>
                                    <form action="{{ route('f.form.pertanyaan.destroy', [$data->token, $p->id]) }}"
                                        class="hidden" method="POST">
                                        @csrf
                                        @method('DELETE')
                                    </form>
                                </span>
                            </td>
                        </tr>
                    @endforeach
                    <tr>
                        <td colspan="5" class="form-show__tambah-pertanyaan">+ Tambah Pertanyaan</td>
                    </tr>
                </tbody>
            </table>
        </div>

        @livewire('form-jawaban-new', ['formid' => $data->id])
    </div>
@endsection

@section('extrajs')
    {{-- <script src="{{ url('assets/js/koneksi/form.js') }}"></script> --}}
    <script>
        $('.form-show__value--shortlink img').click(() => {
            navigator.clipboard.writeText($('.form-show__value--shortlink')[0].innerText)
            // kasi alert kalo berhasil di copy
        })

        $('.form-show__btn').click(e => {
            for ($i = 0; $i < $('.form-show__btn').length; $i++) {
                if ($('.form-show__btn')[$i].classList[1] == 'btn-primary') {
                    $('.form-show__btn')[$i].classList.remove('btn-primary')
                }
                if ($('.form-show__content-body')[$i].classList[2] == 'active') {
                    $('.form-show__content-body')[$i].classList.remove('active')
                }
            }

            e.target.classList.add('btn-primary')

            // console.log($('.form-show__content-body--' + e.target.getAttribute('data-name')));
            $('.form-show__content-body--' + e.target.getAttribute('data-name'))[0].classList.add('active')
        })
    </script>
@endsection
