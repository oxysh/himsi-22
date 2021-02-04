@extends('template.bootstrap.temp')

@section('title')
    Detail Form
@endsection

@section('content')
    <div class="container my-5">
        <div class="row">
            <h1>Detail Form</h1>
        </div>

        @if (Session::has('success'))
            <div class="row">
                <div class="alert alert-success" role="alert">
                    {{ Session::get('success') }}
                </div>
            </div>
        @endif

        <div class="row my-4">
            <div class="col">
                <div class="card card-body">
                    <p>
                        <strong>Judul</strong> : {{ $form->judul }} <br>
                        <strong>Pemilik</strong> : {{ $form->pemilik }} <br>
                        <strong>Penggunaan Token</strong> : {{ $form->token ? 'ya' : 'tidak' }} <br>
                        <strong>Deadline</strong> : {{ $form->deadline }} <br>
                        {{-- <button type="button" class="btn btn-outline-info mt-2"
                            data-toggle="modal" data-target="#infoModal">
                            Ubah Info Form
                        </button> --}}

                        <a href="{{ route('form.excel', $form->id) }}">
                            <button type="button" class="btn btn-dark mt-4">Unduh Data Responden dalam Excel</button>
                        </a>

                        <button type="button" class="btn btn-success ml-3 mt-4" data-toggle="modal"
                            data-target="#formUpdate">
                            Ubah Informasi Form
                        </button>

                        @isset($form->kadaluarsa)
                            @if ($form->kadaluarsa)
                            <div class="alert alert-danger" role="alert">
                                Form Sudah Berakhir
                            </div>
                            @endif
                        @endisset
                        
                    </p>
                </div>
            </div>
        </div>

        <div class="row my-4">
            <div class="col">
                @if ($form->terkunci)
                    <span class="mb-2 badge badge-warning">
                        Seluruh pertanyaan telah dikunci,
                        Anda tidak bisa mengubah-ubah lagi,
                        Hubungi staff ristek untuk melakukan perubahan
                    </span>
                @endif
                <div class="row">
                    <button class="btn btn-primary" type="button" data-toggle="collapse" data-target="#infoPertanyaan"
                        aria-expanded="false" aria-controls="infoPertanyaan">Lihat List Pertanyaan</button>
                    @if (!$form->terkunci)
                        <button type="button" class="btn btn-success ml-3" data-toggle="modal"
                            data-target="#staticBackdrop">
                            Buat Pertanyaan Baru
                        </button>
                        <a href="{{ route('form.lock', $form->id) }}"><button class="btn btn-warning ml-3">Kunci Seluruh
                                Pertanyaan</button></a>

                    @endif
                </div>

                <div class="collapse multi-collapse" id="infoPertanyaan">
                    @foreach ($form->pertanyaan as $p)
                        <div class="card card-body my-3">
                            <p>
                                <strong>Tipe</strong> : {{ $p->tipe }} <br>
                                <strong>Pertanyaan</strong> : {{ $p->pertanyaan }} <br>
                                @if ($p->opsi != null)
                                    <strong>Opsi</strong> : {{ $p->opsi }} <br>
                                @endif
                                @if (!$form->terkunci)
                                    {{-- <a href="{{ route('pertanyaan.destroy', $p->id) }}">Edit Pertanyaan</a> <br> --}}
                                    <a href="{{ route('pertanyaan.destroy', $p->id) }}">Hapus Pertanyaan</a>
                                @endif
                            </p>
                        </div>
                    @endforeach

                </div>
            </div>
        </div>

        <!-- Modal -->
        <div class="modal fade" id="staticBackdrop" data-backdrop="static" data-keyboard="false" tabindex="-1"
            aria-labelledby="staticBackdropLabel" aria-hidden="true">
            <div class="modal-dialog">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title" id="staticBackdropLabel">Pertanyaan Baru</h5>
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                        </button>
                    </div>
                    <div class="modal-body">
                        <form action="{{ route('pertanyaan.store') }}" method="post">
                            @csrf
                            <input type="hidden" name="formid" value="{{ $form->id }}">

                            <div class="form-group">
                                <label for="formTipe">Tipe Data Pertanyaan</label>
                                <select name="tipe" class="form-control" id="formTipe">
                                    <option value="text">text</option>
                                    <option value="select">opsi</option>
                                    <option value="date">tanggal</option>
                                    <option value="datetime-local">tanggal dan waktu</option>
                                    <option value="time">waktu</option>
                                    <option value="number">angka</option>
                                </select>
                            </div>
                            <div class="form-group">
                                <label for="formPertanyaan">Pertanyaan-nya</label>
                                <input name="pertanyaan" type="text" class="form-control" id="formPertanyaan">
                            </div>
                            <div class="form-group">
                                <label for="opsiTextArea">Opsi</label>

                                <textarea name="opsi" class="form-control" id="opsiTextArea" rows="3"
                                    aria-describedby="opsiHelp"></textarea>
                                <small id="opsiHelp" class="form-text text-muted">jika memilih tipe pertanyaan
                                    <strong>opsi</strong>
                                    <br> maka tulis opsi dari pertanyaan pada kolom ini
                                    <br> opsi pisahkan dengan tanda koma (,)
                                    <br> tidak perlu menggunakan spasi setelah tanda koma</small>
                            </div>

                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                        <button type="submit" class="btn btn-primary">Tambahkan</button>
                        </form>
                    </div>
                </div>
            </div>
        </div>

        <!-- Modal -->
        <div class="modal fade" id="formUpdate" data-backdrop="static" data-keyboard="false" tabindex="-1"
            aria-labelledby="formUpdateLabel" aria-hidden="true">
            <div class="modal-dialog">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title" id="formUpdateLabel">Updaet Form</h5>
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                        </button>
                    </div>
                    <div class="modal-body">
                        <form action="{{ route('form.update', $form->id) }}" method="post">
                            @csrf

                            <div class="form-group">
                                <label for="formJudul">Judul Form</label>
                                <input name="judul" type="text" class="form-control" id="formJudul"
                                    value="{{ $form->judul }}">
                            </div>
                            <div class="form-group">
                                <label for="pemilik">Pemilik Form</label>
                                <select name="pemilik" class="form-control" id="pemilik">
                                    <option {{ old('pemilik') == "HIMSI" ? 'selected' : '' }} value="HIMSI">HIMSI</option>
                                    <option {{ old('pemilik') == Auth::user()->role ? 'selected' : '' }} value="{{Auth::user()->role}}">{{Auth::user()->role}}</option>
                                </select>
                            </div>
            
                            <div class="form-group">
                                <label for="formTipe">Penggunaan Token untuk Responden</label>
                                <select name="token" class="form-control" id="formTipe">
                                    <option {{ $form->token ? 'selected' : '' }} value="YA">YA</option>
                                    <option {{ $form->token ? '' : 'selected' }} value="TIDAK">TIDAK</option>
                                </select>
                            </div>
                            <div class="form-group">
                                <label for="deadline">Deadline Form</label>
                                <input type="datetime-local" class="form-control @error('deadline') is-invalid @enderror"
                                    name="deadline" id="deadline" aria-describedby="deadlineFeedback" value="{{ $form->dedlen }}">
                            </div>
                            {{-- <div class="form-group">
                                <label for="deadline">Deadline Form</label>
                                <input type="datetime-local" class="form-control @error('deadline') is-invalid @enderror"
                                    name="deadline" id="deadline" aria-describedby="deadlineFeedback"
                                    value="{{ $form->deadline }}">
                                @error('deadline')
                                <div id="deadlineFeedback" class="invalid-feedback">
                                    {{ $message }}
                                </div>
                                @enderror
                            </div > --}}


                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                        <button type="submit" class="btn btn-primary">Ubah</button>
                        </form>
                    </div>
                </div>
            </div>
        </div>

        @livewire('form-jawaban', ['formid' => $form->id])


    </div>
@endsection
