@extends('template.koneksi.template-admin')

@section('title')
    Form {{ Auth::User()->name }}
@endsection
@section('seo-desc', ''){{-- ini buat deskripsi seo --}}
@section('seo-img', '') {{-- ini buat gambar seo --}}

@section('bodyclass', '') {{-- kalo butuh class buat body --}}
@section('container', 'adm-form')

@section('content')
    <h3 class="midnight-blue">Form</h3>
    <div class="adm-dashboard__card-container">
        @foreach ($form as $f)
            <div class="adm-dashboard__card adm-dashboard__card--form"
                onclick="location.href = '{{ route('form.show', $f->id) }}'">
                <div class="  adm-dashboard__card-title-section">
                    <h4 class="midnight-blue">{{ $f->judul }}</h4>
                    <h5 class="midnight-blue">{{ $f->pemilik }}</h5>
                </div>
                <h5 class="grey">{{ sizeof($f->penjawab) }} Responden</h5>
                <p class="grey">{{ $f->deadline }}</p>
                @php
                    $origin = new DateTime();
                    $deadline = new DateTime($f->deadline);
                    $diff = $origin->diff($deadline);
                    if ($diff->invert) {
                        session()->flash('expired', true);
                    }
                @endphp
                @if ($diff->invert)
                    <p class="adm-dashboard__info adm-dashboard__info--ditutup">Ditutup</p>
                @else
                    <p class="adm-dashboard__info adm-dashboard__info--dibuka">Dibuka</p>
                @endif
            </div>
        @endforeach
        <div class="adm-form__add-form" id="addForm">
            <h4 class="grey">Buat Form</h4>
        </div>
    </div>

    {{-- modal --}}
    <div class="form-show__edit-dialog dialog" id="addFormDialog">
        <div class="form-show__edit-dialog-content">
            <form action="{{ route('form.store') }}" method="POST" class="dialog__card form-show__edit-form">
                @csrf
                <div class="form__group">
                    <div class="form__head">
                        <label for="judul" class="form__label">Judul <span class="red">*</span></label>
                        <h6 class="form__helper hidden" id="error-judul">Harus diisi</h6>
                    </div>
                    <input type="text" name="judul" id="judul" value="{{ old('judul') }}"
                        class="form__control form-previewed form__harus-diisi" placeholder="Judul disini"
                        data-error="#error-judul" data-preview="#form-preview-title">
                </div>
                <div class="form__group">
                    <div class="form__head">
                        <label for="deadline" class="form__label">Batas Pengisian <span
                                class="red">*</span></label>
                        <h6 class="form__helper hidden" id="error-deadline">Harus diisi</h6>
                    </div>
                    <input type="datetime-local" name="deadline" id="deadline" value="{{ old('deadline') }}"
                        class="form__control form__harus-diisi" data-error="#error-deadline">
                </div>
                <div class="form__group">
                    <div class="form__head">
                        <label for="deskripsi" class="form__label">Deskripsi <span
                                class="red">*</span></label>
                        <h6 class="form__helper hidden" id="error-deskripsi">Harus diisi</h6>
                    </div>
                    <textarea type="text" name="deskripsi" id="deskripsi" class="form__control form-previewed"
                        placeholder="deskripsi disini" data-error="#error-deskripsi"
                        data-preview="#form-preview-deskripsi">{{ old('deskripsi') }}</textarea>
                </div>

                <div class="form__group">
                    <div class="form__head">
                        <label for="pemilik" class="form__label">Pemilik <span class="red">*</span></label>
                        <h6 class="form__helper hidden" id="error-afterform-link">Harus diisi</h6>
                    </div>
                    <select name="pemilik" id="pemilik" class="form__control">
                        <option {{ old('pemilik') == Auth::user()->role ? 'selected' : '' }}
                            value="{{ Auth::user()->role }}">{{ Auth::user()->role }}, akses edit hanya bidang
                            anda</option>
                        <option {{ old('pemilik') == 'HIMSI' ? 'selected' : '' }} value="HIMSI">HIMSI, akses edit
                            untuk semua bidang</option>
                    </select>

                    {{-- <input type="text" name="afterformlink" id="afterform-link" class="form__control form-previewed"
                        placeholder="https://example.com" value="{{ $data->afterformlink }}"
                        data-error="#error-afterform-link" data-preview="#form-preview-afterform-link"> --}}
                </div>
                <div class="dialog__btns">
                    <button type="button" class="btn-close btn-secondary">Cancel</button>
                    <button type="submit" class="btn-primary">Submit</button>
                </div>
            </form>

            <div class="dialog__card form-show__edit-preview">
                <h3 class="midnight-blue">Live Preview - Form</h3>
                <div class="form-show__live-preview form-show__live-preview--form">
                    <h3 id="form-preview-title">Judul Form</h3>
                    <p id="form-preview-deskripsi">Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do
                        eiusmod tempor </p>
                    <div class="form__group">
                        <div class="form__head">
                            <label for="contoh" class="form__label">Contoh <span class="red">*</span></label>
                        </div>
                        <input type="text" name="contoh" id="contoh" class="form__control" placeholder="Contoh form"
                            data-error="#error-contoh" disabled>
                    </div>
                    <button disabled class="btn-primary">Submit</button>
                </div>
                <hr class="form-show__live-preview-divider">
                <h3 class="midnight-blue">Live Preview - Afterform</h3>
                <div class="form-show__live-preview">
                    <div class="form-show__live-preview--afterform">
                        <h3 id="form-preview-title-afterform">Judul Form</h3>
                        <p id="form-preview-afterform">Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do
                            eiusmod tempor </p>
                        <a href="#" id="form-preview-afterform-link" class="underline-link">link</a>
                    </div>
                    <button disabled="disabled" class="btn-primary">Kembali</button>
                </div>
            </div>
        </div>
    </div>
    <div class="dialog__bg"></div>
@endsection

@section('extrajs')
    {{-- <script src="{{ url('assets/js/koneksi/adm-form.js') }}"></script> --}}
    <script>
        $('#addForm').click(() => {
            $('#addFormDialog')[0].classList.add('active')
            $('.dialog__bg')[0].classList.add('active')
        })
    </script>
@endsection
