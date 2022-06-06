@extends('template.koneksi.template')

@section('title')
    {{ $form->judul }}
@endsection
@section('seo-desc', ''){{-- ini buat deskripsi seo --}}
@section('seo-img', '') {{-- ini buat gambar seo --}}

@section('bodyclass', '') {{-- kalo butuh class buat body --}}
@section('container', 'form-responden')

@section('content')
    <form action="{{ route('form.bitly.submit', $bitly) }}" method="POST" class="form-responden__form">
        @csrf
        <input type="hidden" name="formid" value="{{ $form->id }}">

        <div class="form-responden__title-section">
            <h2>{{ $form->judul }}</h2>
            <p class="grey">{{ $form->deskripsi }}</p>
        </div>

        <div class="form-responden__input-form">
            @foreach ($form->pertanyaan as $p)
                <div class="form__group">
                    <div class="form__head">
                        <label for="{{ 'form-responden__' . $p->id }}" class="form__label">{{ $p->pertanyaan }} <span
                                class="red">{{ $p->mandatory ? '*' : '' }}</span></label>
                        <h6 class="form__helper red-important hidden" id="form-error-{{ $p->id }}">Harus diisi</h6>
                    </div>
                    @switch($p->tipe)
                        @case('select')
                            <select class="form__control {{ $p->mandatory ? 'required' : '' }}" name="{{ $p->id }}"
                                id="{{ 'form-responden__' . $p->id }}" data-error="{{ '#form-error-' . $p->id }}">
                                <option value="" disabled selected>pilih</option>
                                @foreach ($p->opsi as $o)
                                    <option value="{{ $o }}">{{ $o }}</option>
                                @endforeach
                            </select>
                        @break

                        @case('textarea')
                            <textarea name="{{ $p->id }}" id="{{ 'form-responden__' . $p->id }}"
                                class="form__control {{ $p->mandatory ? 'required' : '' }}"
                                placeholder="{{ $p->pertanyaan }}"
                                data-error="{{ '#form-error-' . $p->id }}"></textarea>
                        @break

                        @default
                            <input type="{{ $p->tipe }}" name="{{ $p->id }}"
                                class="form__control {{ $p->mandatory ? 'required' : '' }}" placeholder="{{ $p->pertanyaan }}"
                                id="{{ 'form-responden__' . $p->id }}" data-error="{{ '#form-error-' . $p->id }}">
                    @endswitch
                </div>
            @endforeach
            <p class="red">* wajib diisi</p>

            <button type="submit" class="btn-primary">Submit</button>
        </div>
    </form>
@endsection

@section('extrajs')
    <script src="{{ url('assets/js/koneksi/form-responden.js') }}"></script>
@endsection
