@extends('template.koneksi.template-admin')

@section('title', 'Form - Selamat Datang di Form HIMSI')
@section('seo-desc', ''){{-- ini buat deskripsi seo --}}
@section('seo-img', '') {{-- ini buat gambar seo --}}

@section('bodyclass', '') {{-- kalo butuh class buat body --}}
@section('container', 'form-show adm-form')

@section('content')
    <div class="alert alert--info form-show__alert-copied not-out hidden">
        <div class="alert__content">
            <img class="alert__img" src="{{ url('assets/img/alert-info.svg') }}" alt="">
            <h4 class="alert__message">Berhasil menyalin shortlink.</h4>
        </div>
        <img class="alert__close" src="{{ url('assets/img/alert-close.svg') }}" alt="">
    </div>

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
                <p class="form-show__label form-show__label--shortlink midnight-blue">Short link</p>
                <p class="form-show__value form-show__value--shortlink grey">himsiunair.com/f/{{ $data->bitly }}
                    <span>
                        <img src="{{ url('assets/img/paste.svg') }}"
                            class="form-show__option-btn form-show__option-btn--copy-shortlink">
                        <img src="{{ url('assets/img/edit.svg') }}"
                            class="form-show__option-btn form-show__option-btn--edit-shortlink">
                    </span>
                </p>
                <hr class="form-show__desc-divider">
                <p class="form-show__label form-show__label--author midnight-blue">Author</p>
                <p class="form-show__value form-show__value--author grey">{{ $data->pemilik }}</p>
                <p class="form-show__label form-show__label--judul midnight-blue">Judul</p>
                <p class="form-show__value form-show__value--judul grey">{{ $data->judul }}</p>
                <p class="form-show__label form-show__label--token midnight-blue">Token</p>
                <p class="form-show__value form-show__value--token grey">{{ $data->id }}</p>
                <p class="form-show__label form-show__label--deadline midnight-blue">Batas Pengisian</p>
                <p class="form-show__value form-show__value--deadline grey">{{ $data->deadline }}</p>
                <p class="form-show__label form-show__label--deskripsi midnight-blue">Deskripsi</p>
                <p class="form-show__value form-show__value--deskripsi grey">{{ $data->deskripsi }}</p>
                <p class="form-show__label form-show__label--afterform midnight-blue">Afterform</p>
                <p class="form-show__value form-show__value--afterform grey">{{ $data->afterform }}</p>
                <p class="form-show__label form-show__label--afterformlink midnight-blue">Afterform Link</p>
                <p class="form-show__value form-show__value--afterformlink grey">{{ $data->afterformlink }}</p>
            </div>
            <div class="form-show__option-btns">
                <a href="{{ route('form.excel', $data->id) }}" class="form-show__option-btn"><img
                        src="{{ url('assets/img/download.svg') }}" alt=""></a>
                <button class="form-show__option-btn" id="formEdit"><img src="{{ url('assets/img/edit.svg') }}"
                        alt=""></button>
                <button class="form-show__option-btn" id="formDelete"><img src="{{ url('assets/img/delete.svg') }}"
                        alt=""></button>
            </div>
        </div>

        <div class="form-show__content-body form-show__content-body--pertanyaan">
            <button class="form-show__urutkan-pertanyaan" id="sortPertanyaan">Urutkan Pertanyaan</button>
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
                            <td>{{ $p->mandatory ? 'Iya' : 'Tidak' }}</td>
                            <td>
                                <span class="form-show__aksi-pertanyaan">
                                    <img src="{{ url('assets/img/edit.svg') }}" alt="" class="form-show__edit-pertanyaan"
                                        data-tipe="{{ $p->tipe }}" data-quest="{{ $p->pertanyaan }}"
                                        data-opsi="{{ $p->opsi }}" data-unique="{{ $p->id }}"
                                        data-wajib="{{ $p->mandatory ? '1' : '0' }}"
                                        data-link="{{ route('pertanyaan.update', [$data->id, $p->id]) }}">
                                    <img src="{{ url('assets/img/delete.svg') }}" class="form-show__delete-pertanyaan"
                                        data-quest="{{ $p->pertanyaan }}"
                                        data-link="{{ route('pertanyaan.destroy', [$data->id, $p->id]) }}">
                                </span>
                            </td>
                        </tr>
                    @endforeach
                    <tr>
                        <td colspan="5" class="form-show__tambah-pertanyaan" id="addPertanyaan">+ Tambah Pertanyaan</td>
                    </tr>
                </tbody>
            </table>
        </div>

        @livewire('form-jawaban-new', ['formid' => $data->id])
    </div>

    {{-- modalsss --}}
    <div class="form-show__edit-dialog dialog" id="editDialog">
        <div class="form-show__edit-dialog-content">
            <form action="{{ route('form.update', $data->id) }}" method="POST" class="dialog__card form-show__edit-form">
                @csrf
                @method('PUT')
                <div class="form__group">
                    <div class="form__head">
                        <label for="judul" class="form__label">Judul <span class="red">*</span></label>
                        <h6 class="form__helper red-important hidden" id="error-judul">Harus diisi</h6>
                    </div>
                    <input type="text" name="judul" id="judul" class="form__control form-previewed form__harus-diisi"
                        placeholder="Judul disini" value="{{ $data->judul }}" data-error="#error-judul"
                        data-preview="#form-preview-title">
                </div>
                <div class="form__group">
                    <div class="form__head">
                        <label for="deadline" class="form__label">Batas Pengisian <span
                                class="red">*</span></label>
                        <h6 class="form__helper red-important hidden" id="error-deadline">Harus diisi</h6>
                    </div>
                    <input type="datetime-local" name="deadline" id="deadline" class="form__control form__harus-diisi"
                        value="{{ $data->inputdeadline }}" data-error="#error-deadline">
                </div>
                <div class="form__group">
                    <div class="form__head">
                        <label for="deskripsi" class="form__label">Deskripsi <span
                                class="red">*</span></label>
                        <h6 class="form__helper red-important hidden" id="error-deskripsi">Harus diisi</h6>
                    </div>
                    <textarea type="text" name="deskripsi" id="deskripsi" class="form__control form-previewed"
                        placeholder="deskripsi disini" data-error="#error-deskripsi"
                        data-preview="#form-preview-deskripsi">{{ $data->deskripsi }}</textarea>
                </div>
                <div class="form__group">
                    <div class="form__head">
                        <label for="afterform" class="form__label">Afterform</label>
                        <h6 class="form__helper red-important hidden" id="error-afterform">Harus diisi</h6>
                    </div>
                    <input type="text" name="afterform" id="afterform" class="form__control form-previewed"
                        placeholder="afterform disini" value="{{ $data->afterform }}" data-error="#error-afterform"
                        data-preview="#form-preview-afterform">
                </div>
                <div class="form__group">
                    <div class="form__head">
                        <label for="afterform-link" class="form__label">Afterform Link</label>
                        <h6 class="form__helper red-important hidden" id="error-afterform-link">Harus diisi</h6>
                    </div>
                    <input type="text" name="afterformlink" id="afterform-link" class="form__control form-previewed"
                        placeholder="https://example.com" value="{{ $data->afterformlink }}"
                        data-error="#error-afterform-link" data-preview="#form-preview-afterform-link">
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

    <form action="{{ route('form.bitly', $data->id) }}" method="POST"
        class="form-show__edit-shortlink-dialog dialog dialog__card">
        @csrf
        @method('PUT')
        <div class="form__group">
            <div class="form__head">
                <label for="shortlink" class="form__label">Shortlink <span class="red">*</span></label>
                <h6 class="form__helper red-important hidden" id="error-shortlink">Harus diisi</h6>
            </div>
            <div class="form__group form__group--oneline">
                <label for="shortlink" class="form__label">himsiunair.com/f/</label>
                <input type="text" name="shortlink" id="shortlink" class="form__control" placeholder="jHIj8sPdg"
                    value="{{ $data->bitly }}" id="shortlink" data-error="#error-shortlink">
            </div>
            <input type="hidden" name="valid-shortlink" id="valid-shortlink" value="{{ $data->bitly }}">
        </div>

        <div class="dialog__btns">
            <button type="button" class="btn-close btn-secondary">Cancel</button>
            <button type="submit" class="btn-primary">Submit</button>
        </div>
    </form>

    <form action="{{ route('form.destroy', $data->id) }}" method="POST"
        class="form-show__delete-dialog dialog dialog__card" id="deleteFormDialog">
        @csrf
        @method('DELETE')
        <h3 class="red">Yakin ingin menghapus form ini?</h3>
        <p>Jika anda menghapus form ini, seluruh data tidak dapat dikembalikan.</p>
        <div class="dialog__btns">
            <button type="button" class="btn-close btn-primary">Cancel</button>
            <button type="submit" class="btn-danger">Hapus</button>
        </div>
    </form>

    <form action="" method="POST" class="form-show__delete-dialog dialog dialog__card" id="deletePertanyaanDialog">
        @csrf
        @method('DELETE')
        <h3 class="red">Yakin ingin menghapus pertanyaan ini?</h3>
        <p>Jika anda menghapus pertanyaan "<span></span>", seluruh data tidak dapat dikembalikan.</p>
        <div class="dialog__btns">
            <button type="button" class="btn-close btn-primary">Cancel</button>
            <button type="submit" class="btn-danger">Hapus</button>
        </div>
    </form>

    <div class="form-show__edit-dialog dialog" id="addPertanyaanDialog">
        <div class="form-show__edit-dialog-content">
            <form action="{{ route('pertanyaan.store', $data->id) }}" method="POST"
                class="dialog__card form-show__form-add-pertanyaan">
                @csrf
                <input type="hidden" name="uniq_id" value="" id="tambah-pertanyaan-unique">
                <div class="form__group">
                    <div class="form__head">
                        <label for="tambah-pertanyaan-title" class="form__label">Judul <span
                                class="red">*</span></label>
                        <h6 class="form__helper red-important hidden" id="error-tambah-pertanyaan-title">Harus diisi</h6>
                    </div>
                    <input type="text" name="pertanyaan" id="tambah-pertanyaan-title"
                        class="form__control form__harus-diisi" placeholder="Judul disini"
                        data-error="#error-tambah-pertanyaan-title">
                </div>
                <div class="form__group">
                    <div class="form__head">
                        <label for="tambah-pertanyaan-jenis" class="form__label">Tipe pertanyaan <span
                                class="red">*</span></label>
                        <h6 class="form__helper red-important hidden" id="error-tambah-pertanyaan-jenis">Harus diisi</h6>
                    </div>
                    <select name="tipe" class="form__control form__harus-diisi" id="tambah-pertanyaan-jenis"
                        data-error="#error-tambah-pertanyaan-jenis">
                        <option value="text" selected>Teks pendek</option>
                        <option value="textarea">Teks panjang</option>
                        <option value="select">Opsi/pilihan ganda</option>
                        <option value="date">Tanggal</option>
                        <option value="datetime-local">Tanggal dan Jam</option>
                        <option value="number">Angka</option>
                    </select>
                </div>
                <div class="form__group hidden" id="tambah-pertanyaan-opsi-group">
                    <div class="form__head">
                        <label for="tambah-pertanyaan-opsi" class="form__label">Opsi pertanyaan <span
                                class="red">*</span></label>
                        <h6 class="form__helper" id="error-tambah-pertanyaan-opsi">Pisahkan opsi dengan menggunakan tanda
                            koma (,), dan tanpa menggunakan spasi.</h6>
                    </div>
                    <input type="text" name="opsi" id="tambah-pertanyaan-opsi" class="form__control"
                        placeholder="Opsi pertama,Opsi kedua,Opsi ketiga" data-error="#error-tambah-pertanyaan-opsi">
                </div>
                <div class="form__group">
                    <div class="form__head">
                        <label for="tambah-pertanyaan-wajib" class="form__label">Wajib dijawab <span
                                class="red">*</span></label>
                        <h6 class="form__helper red-important hidden" id="error-tambah-pertanyaan-wajib">Harus diisi</h6>
                    </div>
                    <select name="required" class="form__control form__harus-diisi" id="tambah-pertanyaan-wajib"
                        data-error="#error-tambah-pertanyaan-wajib">
                        <option class="default" value="" disabled selected>pilih</option>
                        <option value="Iya">Iya</option>
                        <option value="Tidak">Tidak</option>
                    </select>
                </div>

                <div class="dialog__btns">
                    <button type="button" class="btn-close btn-secondary">Cancel</button>
                    <button type="submit" class="btn-primary">Submit</button>
                </div>
            </form>

            <div class="dialog__card form-show__live-preview">
                <h3 class="midnight-blue">Live Preview - Form Field</h3>
                <div class="form__group" id="tambah-pertanyaan-preview">
                    <div class="form__head">
                        <label id="tambah-pertanyaan-preview-title" class="form__label">Judul Pertanyaan <span
                                class="red">*</span></label>
                        <h6 class="form__helper">Contoh error</h6>
                    </div>
                    <input type="text" disabled class="form__control" placeholder="Judul Pertanyaan">
                    <textarea name="" id="" class="form__control hidden" placeholder="Judul Pertanyaan" disabled></textarea>
                    <select class="form__control hidden" disabled>
                        <option value="" disabled selected>Pilih satu</option>
                    </select>
                </div>
            </div>
        </div>
    </div>

    <div class="form-show__edit-dialog dialog" id="sortPertanyaanDialog">
        <div class="form-show__edit-dialog-content">
            <form action="{{ route('pertanyaan.sort', $data->id) }}" method="post"
                class="dialog__card form-show__sort-pertanyaan-form">
                @csrf
                <div class="form__group">
                    <div class="form__head">
                        <label for="sort-pertanyaan" class="form__label">Pertanyaan yang ingin dipindah <span
                                class="red">*</span></label>
                        <h6 class="form__helper red-important hidden" id="sort-pertanyaan-error">Harus diisi</h6>
                    </div>
                    <select name="pertanyaan" id="sort-pertanyaan" class="form__control"
                        data-error="#sort-pertanyaan-error">
                        <option value="" disabled selected>pilih</option>
                        @foreach ($data->pertanyaan as $p)
                            <option value="{{ $p->id }}">{{ $p->pertanyaan }}</option>
                        @endforeach
                    </select>
                </div>
                <div class="form__group">
                    <div class="form__head">
                        <label for="sort-urutan" class="form__label">Pertanyaan dipindah ke posisi berapa? <span
                                class="red">*</span></label>
                        <h6 class="form__helper red-important hidden" id="sort-urutan-error">Harus diisi</h6>
                    </div>
                    <select name="number" id="sort-urutan" class="form__control" data-error="#sort-urutan-error">
                        <option value="" disabled selected>pilih</option>
                        @foreach ($data->pertanyaan as $p)
                            <option value="{{ $loop->iteration }}">{{ $loop->iteration }}</option>
                        @endforeach
                    </select>
                </div>

                <div class="dialog__btns">
                    <button type="button" class="btn-close btn-secondary">Cancel</button>
                    <button type="submit" class="btn-primary">Submit</button>
                </div>
            </form>

            <div class="form-show__urutan-pertanyaan-sekarang dialog__card">
                <h3 class="midnight-blue">Urutan Sekarang</h3>
                @foreach ($data->pertanyaan as $p)
                    <div class="form-show__urutan-pertanyaans">
                        <p>{{ $loop->iteration }}</p>
                        <p class="grey">{{ $p->pertanyaan }}</p>
                    </div>
                @endforeach
            </div>
        </div>
    </div>

    <div class="dialog__bg"></div>
@endsection

@section('extrajs')
    <script src="{{ url('assets/js/koneksi/form-show.js') }}"></script>
@endsection
