@extends('template.cakrawala.admin.template')

@section('title')

@endsection

@section('extracss')
    <link rel="stylesheet" href="{{ url('assets/css/form-list.css') }}">
@endsection

@section('content')
    <span class="h2">Form list</span>
    <div class="button-group">
        <button class="btn btn-primary btn-modal-trigger" data-modal="#modal-buat-form">Buat <img src="img/plus.svg"
                alt=""></button>
    </div>
    <div class="grid-system">
        @foreach ($form as $f)

            <div class="card" data-link="{{ route('form.show', $f->id) }}">
                <div class="card-body p">
                    <span class="card-title">{{ $f->judul }}</span>
                    <span class="">{{ sizeof($f->penjawab) }} Responden / Pengisi Form</span>
                    <span class="">{{ $f->deadline }} - Milik {{ $f->pemilik }}</span>
                </div>
                <div class="card-line">
                </div>
            </div>
        @endforeach

    </div>
@endsection


@section('modal')
    <div class="modal hide" id="modal-buat-form">
        <div class="modal-box">
            <div class="modal-head">
                <span class="modal-title">Buat Form Baru</span>
                <span class="modal-close-button close-button">Close</span>
            </div>
            <hr>
            <div class="modal-body">
                <form action="{{ route('form.store') }}" method="POST">
                    @csrf
                    <div class="form-group">
                        <label for="exampleInput1">Judul Form</label>
                        <input name="judul" type="text" value="{{ old('judul') }}"
                            class="form-control @error('judul') is-invalid @enderror" id="exampleInput1"
                            data-error="#exampleInput1Error">
                        <small class="form-error caption hide" id="exampleInput1Error">Harus di isi</small>
                        @error('judul')
                            <small class="form-error caption hide">{{ $message }}</small>
                        @enderror
                    </div>
                    <div class="form-group">
                        <label for="exampleInput2">Deksirpsi</label>
                        <textarea name="deskripsi" id="exampleInput2" rows="3" class="form-control"
                            data-error="#exampleInput2Error"></textarea>
                        <small class="form-error caption hide" id="exampleInput2Error">Harus di isi</small>
                    </div>
                    <div class="form-group">
                        <label for="exampleInput3">Deadline Form</label>
                        <input name="deadline" type="datetime-local"
                            class="form-control @error('deadline') is-invalid @enderror" id="exampleInput3"
                            data-error="#exampleInput3Error">
                        <small class="form-error caption hide" id="exampleInput3Error">Harus di isi</small>
                    </div>
                    <div class="form-group">
                        <label for="exampleInput4">Pemilik Form</label>
                        <select name="pemilik" id="exampleInput4" class="form-control" data-error="#exampleInput4Error">
                            <option value="">pilih</option>
                            <option {{ old('pemilik') == 'HIMSI' ? 'selected' : '' }} value="HIMSI">HIMSI, akses edit
                                untuk semua bidang</option>
                            <option {{ old('pemilik') == Auth::user()->role ? 'selected' : '' }}
                                value="{{ Auth::user()->role }}">{{ Auth::user()->role }}, akses edit hanya bidang
                                anda</option>
                        </select>
                        <small class="form-error caption hide" id="exampleInput4Error">Harus di isi</small>
                    </div>
                    <div class="form-group">
                        <label for="">For Your Information</label>
                        <textarea disabled name="" id="" cols="" rows="4"
                            class="form-control not-required-validate">untuk afterform, afterformlink bisa anda edit di detail edit, menambah pertanyaan juga dilakukan disana, mengubah shortlink juga dilakukan disana</textarea>
                    </div>
                </form>

            </div>
            <hr>
            <div class="modal-foot">
                <button class="modal-close-button btn-close">Cancel</button>
                <button class="btn-submit modal-go-btn">Submit</button>
            </div>
        </div>
    </div>
@endsection


@section('extrajs')
    <script src="{{ url('assets/js/form-list.js') }}"></script>
    <script>
        document.querySelector('#nav-form').classList.add('active');

    </script>
@endsection
