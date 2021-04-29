@extends('template.cakrawala.admin.template')

@section('title')
    Form
@endsection

@section('extracss')
    <link rel="stylesheet" href="{{ url('assets/css/form-edit.css') }}">
@endsection

@section('content')
    <h3>Form Details - Edit Form</h3>

    <div class="detail-form">
        <div class="info">
            <span class="p"><strong>Judul : </strong>{{ $data->judul }}</span>
            <span class="p"><strong>Pemilik : </strong>{{ $data->pemilik }} ({{ $data->token }})</span>
            <span class="p"><strong>Deadline : </strong>{{ $data->deadline }}</span>
            <span class="p"><strong>Deskripsi : </strong>{{ $data->deskripsi }}</span>
            <span class="p"><strong>Afterform : </strong>{{ $data->afterform }}</span>
            <span class="p"><strong>Afterform-link : </strong>{{ $data->afterformlink }}</span>
        </div>
        <a href="#" class="btn-edit btn-modal-trigger" data-modal="#modal-identity"> <img
                src="{{ url('/assets/img/setting.svg') }}" alt="">
            Ubah</a>
    </div>

    <div class="detail-form" id="short-link">
        <div class="info">
            <span class="p"><strong>Short-Link :</strong> himsiunair.com/f/{{ $data->bitly }}</span>
        </div>
        <a href="#" class="btn-edit btn-modal-trigger" data-modal="#modal-shortlink"> <img
                src="{{ url('/assets/img/setting.svg') }}" alt="">
            Ubah</a>
    </div>

    <div class="detail-form" id="excel" onclick="location.href = '{{route('form.excel',$data->id)}}'">
        <img src="{{ url('assets/img/excel-ico.svg') }}" alt="" id="ico-excel">
        <span> Unduh data dalam bentuk Excel </span>
        <img src="{{ url('assets/img/download-ico.svg') }}" alt="" id="ico-download">
    </div>

    <div class="detail-form btn-modal-trigger" data-modal="#modal-delete-form" id="delete">
        Hapus Form
    </div>

    <div class="divider-cover">
        <hr class="divider">
    </div>

    <div class="opsi">
        <span class="p active" data-target=".list-pertanyaan" data-sembunyi=".table-jawaban">List Pertanyaan</span>
        <span class="p" data-target=".table-jawaban" data-sembunyi=".list-pertanyaan">Tabel jawaban</span>
    </div>

    <div class="list-pertanyaan">
        <div class="button-group">
            <button class="p btn-blue btn-modal-trigger" id="btn-tambah-pertanyaan" data-modal="#modal-tambah-pertanyaan"
                data-link="{{ route('pertanyaan.store', $data->id) }}">Tambah
                Pertayaan</button>
            <button class="p btn-red" onclick="alert('fitur masih dalam proses')">Kunci Seluruh Pertanyaan</button>
            <button class="p btn-green btn-modal-trigger" data-modal="#modal-urutkan-pertanyaan">Urutkan
                Pertanyaan</button>
        </div>

        <table>
            <thead>
                <tr>
                    <th>#</th>
                    <th>Tipe</th>
                    <th>Pertanyaan</th>
                    <th>Wajib</th>
                    <th>Aksi</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($data->pertanyaan as $p)
                    <tr>
                        <th>{{ $loop->iteration }}</th>
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
                        <td class="aksi">
                            <a href="#" class="edit btn-modal-trigger" data-modal="#modal-tambah-pertanyaan"
                                data-tipe="{{ $p->tipe }}" data-quest="{{ $p->pertanyaan }}"
                                data-opsi="{{ $p->opsi }}" data-unique="{{ $p->id }}"
                                data-wajib="{{ $p->mandatory ? '1' : '0' }}"
                                data-link="{{ route('pertanyaan.update', [$data->id, $p->id]) }}">Edit</a>
                            <a href="#" class="delete btn-delete-pertanyaan">Delete</a>
                            <form action="{{ route('pertanyaan.destroy', [$data->id, $p->id]) }}" class="hide"
                                method="POST">
                                @csrf
                                @method('DELETE')
                            </form>
                        </td>
                    </tr>
                @endforeach
            </tbody>
        </table>
    </div>

    @livewire('form-jawaban-new', ['formid' => $data->id])

    <div class="mobile-message p">
        Fitur daftar pertanyaan dan daftar jawaban
        <br>
        Tidak tersedia dalam tampilan mobile
    </div>
@endsection

@section('modal')
<div class="modal hide" id="modal-identity">
    <div class="modal-box">
        <div class="modal-head">
            <span class="modal-title h4">
                Title
            </span>
            <span class="close-button modal-close-button">
                Close
            </span>
        </div>
        <hr>
        <div class="modal-body p">
            <form action="{{ route('form.update', $data->id) }}" method="POST">
                @csrf
                @method('PUT')
                <div class="form-group">
                    <label for="judul">Judul</label>
                    <input name="judul" type="text" class="form-control form-previewed" id="judul"
                        data-error="#error-judul" data-preview="#form-preview-title" value="{{ $data->judul }}">
                    <small class="form-error caption hide" id="error-judul">Harus di isi</small>
                </div>

                <div class="form-group">
                    <label for="deadline">Deadline</label>
                    <input name="deadline" type="datetime-local" class="form-control " id="deadline"
                        data-error="#error-deadline" value="{{ $data->inputdeadline }}">
                    <small class="form-error caption hide" id="error-deadline">Harus di isi</small>
                </div>

                <div class="form-group">
                    <label for="deskripsi">Deskripsi</label>
                    <textarea name="deskripsi" id="deskripsi" class="form-control form-previewed" cols="" rows="3"
                        data-error="#error-deskripsi"
                        data-preview="#form-preview-deskripsi">{{ $data->deskripsi }}</textarea>
                    <small class="form-error caption hide" id="error-deskripsi">Harus di isi</small>
                </div>

                <div class="form-group">
                    <label for="afterform">After-form message</label>
                    <textarea name="afterform" id="afterform" class="not-required-validate form-control form-previewed"
                        cols="" rows="3" data-error="#error-afterform"
                        data-preview="#form-preview-afterform">{{ $data->afterform }}</textarea>
                    <small class="caption">Boleh Kosong</small>
                    <small class="form-error caption hide" id="error-afterform">Harus di isi</small>
                </div>

                <div class="form-group">
                    <label for="afterform-link">Afterform-link</label>
                    <input name="afterformlink" type="text" class="not-required-validate form-control form-previewed"
                        id="afterform-link" data-error="#error-afterform-link"
                        data-preview="#form-preview-afterform-link" value="{{ $data->afterformlink }}">
                    <small class="caption">awali dengan http://</small>
                    <small class="caption">Boleh Kosong</small>
                    <small class="form-error caption hide" id="error-afterform-link">Harus di isi</small>
                </div>

            </form>
        </div>
        <hr>
        <div class="modal-foot">
            <button class="btn-close p modal-close-button">cancel</button>
            <button class="btn-submit p modal-go-btn">submit</button>
        </div>
    </div>

    <div class="modal-box-group">

        <div class="modal-box">
            <div class="modal-head">
                <span class="modal-title h4">
                    Live-Preview
                </span>
            </div>
            <hr>
            <div class="modal-body p">
                <form action="#">
                    <span id="form-preview-title" class="h4 form-header">Title</span>
                    <div class="form-group">
                        <p id="form-preview-deskripsi">(Deskripsi) HIMSI adalah lorem ipsum Lorem ipsum dolor, sit
                            amet
                            consectetur adipisicing
                            elit. Fugiat
                            magnam illum, doloribus esse placeat fuga laboriosam deleniti id nemo molestias.
                        </p>
                    </div>
                    <div class="form-group">
                        <label for="contoh">Contoh</label>
                        <input type="text" class="form-control" disabled placeholder="cuma contoh">
                        <small class="form-error caption">Contoh error</small>
                    </div>
                    <div class="form-group submit">
                        <button disabled type="" class="btn btn-primary">contoh submit<img
                                src="{{ url('assets/img/send.svg') }}" alt=""></button>
                    </div>
                </form>
            </div>
        </div>

        <div class="modal-box">
            <div class="modal-head">
                <span class="modal-title h4">After-form Message Preview</span>
            </div>
            <hr>
            <div class="modal-body">
                <div class='alert alert-success-form'>Sukses</div>

                <div class="form-group">
                    <h4>Terima kasih telah mengisi Form ini, semoga lekas waras</h4>
                    <h4 id="form-preview-afterform">here</h4>
                    <a href="#" class="underline-link" id="form-preview-afterform-link">form-preview-afterform-link</a>
                    <a href="#">Isi Form lagi</a>
                </div>
            </div>
        </div>
    </div>
</div>

<div class="modal hide" id="modal-shortlink">
    <div class="modal-box">
        <div class="modal-head">
            <span class="modal-title h4">
                Edit Short-Link
            </span>
            <span class="close-button modal-close-button">
                Close
            </span>
        </div>
        <hr>
        <div class="modal-body p">
            <form action="{{ route('form.bitly', $data->id) }}" method="POST">
                @csrf
                @method('PUT')
                <div class="form-group">
                    <small class="caption">himsiunair.com/f/<strong>XXXX</strong> (isi dibawah)</small>
                    <input name="shortlink" type="text" class="form-control" id="shortlink"
                        data-error="#error-shortlink" value="{{ $data->bitly }}">
                    <input type="hidden" name="valid-shortlink" id="valid-shortlink" value="{{ $data->bitly }}">
                    <small class="caption form-error" id="preview-shortlink">hanya boleh mengandung [A-Z] [a-z]
                        [0-9]
                    </small>
                    <small class="form-error caption hide" id="error-shortlink">Harus di isi</small>
                </div>

            </form>
        </div>
        <hr>
        <div class="modal-foot">
            <button class="btn-close p modal-close-button">cancel</button>
            <button class="btn-submit p modal-go-btn">submit</button>
        </div>
    </div>
</div>

<div class="modal hide" id="modal-tambah-pertanyaan">
    <div class="modal-box">
        <div class="modal-head">
            <span class="modal-title h4">
                Tambah Pertanyaan
            </span>
            <span class="close-button modal-close-button">
                Close
            </span>
        </div>
        <hr>
        <div class="modal-body p">
            <form action="{{ route('pertanyaan.store', $data->id) }}" method="POST">
                @csrf
                <input type="hidden" name="uniq_id" value="" id="tambah-pertanyaan-unique">
                <div class="form-group">
                    <label for="tambah-pertanyaan-title">Judul Pertanyaan-nya</label>
                    <input name="pertanyaan" type="text" class="form-control" id="tambah-pertanyaan-title"
                        data-error="#error-tambah-pertanyaan-title">
                    <small class="form-error caption hide" id="error-tambah-pertanyaan-title">Harus di isi</small>
                </div>

                <div class="form-group">
                    <label for="tambah-pertanyaan-jenis">Tipe Pertanyaan</label>
                    <select name="tipe" class="form-control" id="tambah-pertanyaan-jenis"
                        data-error="#error-tambah-pertanyaan-jenis">
                        <option class="default" value="" disabled selected>pilih</option>
                        <option value="text">text pendek</option>
                        <option value="textarea">text panjang</option>
                        <option value="select">opsi / pilihan ganda</option>
                        <option value="date">tanggal</option>
                        <option value="datetime-local">tanggal dan jam</option>
                        <option value="number">angka</option>
                    </select>
                    <small class="form-error caption hide" id="error-tambah-pertanyaan-jenis">Harus di isi</small>
                </div>
                <div class="form-group hide" id="tambah-pertanyaan-opsi-group">
                    <label for="tambah-pertanyaan-opsi">Opsi</label>
                    <small class="caption">pisahkan opsi menggunakan tanda koma (,)</small>
                    <textarea name="opsi" id="tambah-pertanyaan-opsi" class="form-control not-required-validate" cols=""
                        rows="3"></textarea>
                </div>
                <div class="form-group">
                    <label for="tambah-pertanyaan-wajib">Wajib dijawab</label>
                    <select name="required" class="form-control" id="tambah-pertanyaan-wajib"
                        data-error="#error-tambah-pertanyaan-wajib">
                        <option class="default" value="" disabled selected>pilih</option>
                        <option value="ya">ya</option>
                        <option value="tidak">tidak</option>
                    </select>
                    <small class="form-error caption hide" id="error-tambah-pertanyaan-wajib">Harus di isi</small>
                </div>

            </form>
        </div>
        <hr>
        <div class="modal-foot">
            <button class="btn-close p modal-close-button">cancel</button>
            <button class="btn-submit p modal-go-btn">submit</button>
        </div>
    </div>

    <div class="modal-box">
        <div class="modal-head">
            <span class="modal-title h4">Preview Form Field</span>
        </div>
        <hr>
        <div class="modal-body">
            <div class="form-group" id="tambah-pertanyaan-preview">
                <label id="tambah-pertanyaan-preview-title">Judul Pertanyaan</label>
                <input type="text" disabled class="form-control" placeholder="sama dengan judul">
                <textarea name="" id="" class="form-control hide" cols="" rows="3"></textarea>
                <select class="form-control hide">
                    <option value="" disabled selected>pilih</option>
                </select>
                <small class="form-error caption">Contoh error</small>
            </div>
        </div>
    </div>
</div>

<div class="modal hide" id="modal-urutkan-pertanyaan">
    <div class="modal-box">
        <div class="modal-head">
            <span class="modal-title h4">Urutkan Pertanyaan</span>
            <span class="close-button modal-close-button">Close</span>
        </div>
        <hr>
        <div class="modal-body">
            <form action="{{ route('pertanyaan.sort', $data->id) }}" method="post">
                @csrf
                <div class="form-group">
                    <label for="sort-pertanyaan">Pertanyaan yang ingin dipindah</label>
                    <select name="pertanyaan" id="sort-pertanyaan" class="form-control"
                        data-error="#sort-pertanyaan-error">
                        <option value="" disabled selected>pilih</option>
                        @foreach ($data->pertanyaan as $p)
                            <option value="{{ $p->id }}">{{ $p->pertanyaan }}</option>
                        @endforeach
                    </select>
                    <small class="form-error caption hide" id="sort-pertanyaan-error">Harus dipilih</small>
                </div>
                <div class="form-group">
                    <label for="sort-urutan">Pertanyaan dipindah ke posisi berapa</label>
                    <select name="number" id="sort-urutan" class="form-control" data-error="#sort-urutan-error">
                        <option value="" disabled selected>pilih</option>
                        @foreach ($data->pertanyaan as $p)
                            <option value="{{ $loop->iteration }}">{{ $loop->iteration }}</option>
                        @endforeach
                    </select>
                    <small class="form-error caption hide" id="sort-urutan-error">Harus dipilih</small>
                </div>
            </form>
        </div>
        <hr>
        <div class="modal-foot">
            <button class="btn-close p modal-close-button">cancel</button>
            <button class="btn-submit p modal-go-btn">submit</button>
        </div>
    </div>

    <div class="modal-box">
        <div class="modal-head">
            <span class="modal-title">Urutan Sekarang</span>
        </div>
        <hr>
        <div class="modal-body">
            @foreach ($data->pertanyaan as $p)
                <span class="p"><strong>{{ $loop->iteration }} </strong>{{ $p->pertanyaan }}</span>
            @endforeach
        </div>
    </div>
</div>

<div class="modal hide" id="modal-delete-form">
    <div class="modal-box">
        <div class="modal-head">
            <span class="modal-title">Anda yakin ?</span>
            <span class="close-button modal-close-button">Close</span>
        </div>
        <hr>
        <div class="modal-body">
            <span class="p">Apakah Anda yakin untuk menghapus form ini?</span>
            <span class="caption">form yang sudah dihapus tidak dapat dikembalikan datanya</span>
        </div>
        <form action="{{ route('form.destroy', $data->id) }}" class="hide" method="POST">
            @csrf
            @method('DELETE')
        </form>
        <hr>
        <div class="modal-foot">
            <button class="btn-close p modal-close-button">cancel</button>
            <button class="btn-danger p modal-go-btn">Hapus</button>
        </div>
    </div>
</div>
@endsection

@section('extrajs')
<script src="{{ url('assets/js/form-edit.js') }}"></script>
<script>
    document.querySelector('#nav-form').classList.add('active');

</script>
@endsection
