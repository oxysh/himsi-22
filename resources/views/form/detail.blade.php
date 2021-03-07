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

        @if (Session::has('errorBitly'))
            <div class="row">
                <div class="alert alert-danger" role="alert">
                    {{ Session::get('errorBitly') }}
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
                        <strong>Simple Link</strong> : himsiunair.com/f/{{ $form->bitly }} <br>
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

                        <button type="button" class="btn btn-success ml-3 mt-4" data-toggle="modal"
                            data-target="#formBitly">
                            Ubah Short Link Token
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
                        <button type="button" class="btn btn-info ml-3" data-toggle="modal" data-target="#sortQuestion">
                            Urutkan Pertanyaan
                        </button>
                    @endif
                </div>

                <div class="collapse multi-collapse" id="infoPertanyaan">
                    @foreach ($form->pertanyaan as $p)
                        <div class="card card-body my-3">
                            <p>
                                <strong>Tipe</strong> : {{ $p->tipe }} <br>
                                <strong>Pertanyaan</strong> : {{ $p->pertanyaan }} <br>
                                <strong>Wajib</strong> : {{ $p->mandatory ? 'wajib' : 'tidak wajib' }} <br>
                                <strong>Urutan</strong> : {{$p->sorting }} <br>
                                @if ($p->opsi != null)
                                    <strong>Opsi</strong> : {{ $p->opsi }} <br>
                                @endif
                                <button type="button" class="btn btn-edit-question btn-success" data-toggle="modal"
                                    data-target="#formEdit" data-tipe="{{ $p->tipe }}"
                                    data-quest="{{ $p->pertanyaan }}" data-opsi="{{ $p->opsi }}"
                                    data-unique="{{ $p->id }}" data-wajib="{{ $p->mandatory }}">
                                    Edit Pertanyaan
                                </button> <br>
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

        <!-- Modal Tambah Pertanyaan-->
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
                                <label for="formTipes">Tipe Data Pertanyaan</label>
                                <select name="tipe" class="form-control" id="formTipes">
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
                                <div class="form-check">
                                    <input class="form-check-input" type="checkbox" value="true" name="mandatory"
                                        id="mandatoryCheck">
                                    <label class="form-check-label" for="mandatoryCheck">
                                        Wajib Diisi ?
                                    </label>
                                </div>
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

        <!-- Modal Edit Pertanyaan-->
        <div class="modal fade" id="formEdit" data-backdrop="static" data-keyboard="false" tabindex="-1"
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
                        <form action="{{ route('pertanyaan.update') }}" method="post">
                            @csrf
                            <input type="hidden" name="questid" id="questid" value="">
                            <div class="form-group">
                                <label for="editTipe">Tipe Data Pertanyaan</label>
                                <select name="tipe" class="form-control" id="editTipe">
                                    <option value="text">text</option>
                                    <option value="select">Select / opsi</option>
                                    <option value="date">tanggal</option>
                                    <option value="datetime-local">tanggal dan waktu</option>
                                    <option value="time">waktu</option>
                                    <option value="number">angka</option>
                                </select>
                            </div>
                            <div class="form-group">
                                <label for="editPertanyaan">Pertanyaan-nya</label>
                                <input name="pertanyaan" type="text" class="form-control" id="editPertanyaan">
                            </div>
                            <div class="form-group">
                                <div class="form-check">
                                    <input class="form-check-input" type="checkbox" value="true" name="mandatory"
                                        id="mandatoryCheckEdit">
                                    <label class="form-check-label" for="mandatoryCheckEdit">
                                        Wajib Diisi ?
                                    </label>
                                </div>
                            </div>
                            <div class="form-group">
                                <label for="opsiEdit">Opsi</label>

                                <textarea name="opsi" class="form-control" id="opsiEdit" rows="3"
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
                        <button type="submit" class="btn btn-success">Edit</button>
                        </form>
                    </div>
                </div>
            </div>
        </div>

        <!-- Modal Form Update-->
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
                                    <option {{ old('pemilik') == 'HIMSI' ? 'selected' : '' }} value="HIMSI">HIMSI
                                    </option>
                                    <option {{ old('pemilik') == Auth::user()->role ? 'selected' : '' }}
                                        value="{{ Auth::user()->role }}">{{ Auth::user()->role }}</option>
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
                                    name="deadline" id="deadline" aria-describedby="deadlineFeedback"
                                    value="{{ $form->dedlen }}">
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

        <!-- Modal Bitly Update-->
        <div class="modal fade" id="formBitly" data-backdrop="static" data-keyboard="false" tabindex="-1"
            aria-labelledby="formUpdateLabel" aria-hidden="true">
            <div class="modal-dialog">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title" id="formUpdateLabel">Ajukan Perubahan Token Simple Link</h5>
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                        </button>
                    </div>
                    <div class="modal-body">
                        <form action="{{ route('form.update.bitly', $form->id) }}" method="post">
                            @csrf

                            <div class="form-group">
                                <label for="formToken">Simpel Link Token</label>
                                <input name="bitly" type="text" class="form-control" id="formToken"
                                    value="{{ $form->bitly }}">
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
                        <button type="submit" class="btn btn-primary">Ajukan Perubahan</button>
                        </form>
                    </div>
                </div>
            </div>
        </div>

        <!-- Modal Sort Question-->
        <div class="modal fade" id="sortQuestion" data-backdrop="static" data-keyboard="false" tabindex="-1"
            aria-labelledby="formUpdateLabel" aria-hidden="true">
            <div class="modal-dialog">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title" id="formUpdateLabel">Ajukan Perubahan Token Simple Link</h5>
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                        </button>
                    </div>
                    <div class="modal-body">
                        <form action="{{ route('pertanyaan.sort', $form->id) }}" method="post">
                            @csrf
                            <div class="form-group">
                                <label for="pertanyaan">Pertanyaan yang akan dipindah</label>
                                <select class="form-control" id="pertanyaan" name="questid">\
                                    <option value="" selected disabled>--pilih--</option>
                                    @foreach ($form->pertanyaan as $p)
                                    <option value="{{ $p->id }}">{{ $p->pertanyaan }}</option>
                                    @endforeach
                                </select>
                            </div>
                            <div class="form-group">
                                <label for="numbercontrol">Dipindah ke posisi berapa ?</label>
                                <select class="form-control" id="numbercontrol" name="number">
                                    <option value="" selected disabled>--pilih--</option>
                                    @foreach ($form->pertanyaan as $p)
                                    <option value="{{ $loop->iteration }}">{{ $loop->iteration }}</option>
                                    @endforeach
                                </select>
                            </div>
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                        <button type="submit" class="btn btn-primary">Ajukan Perubahan</button>
                        </form>
                    </div>
                </div>
            </div>
            <div class="modal-dialog modal-dialog-scrollable">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title" id="formUpdateLabel">Urutan Saat ini</h5>
                    </div>
                    <div class="modal-body">
                            @foreach ($form->pertanyaan as $p)
                            <div class="form-group">
                                <label for="pertanyaan">{{$loop->iteration}}</label>
                                <input type="text" disabled value="{{ $p->pertanyaan }}">
                            </div>
                            @endforeach
                    </div>
                </div>
            </div>
        </div>

        @livewire('form-jawaban', ['formid' => $form->id])


    </div>
@endsection

@section('js')
    <script>
        const formID = document.querySelector('#questid');
        const formPertanyaan = document.querySelector('#editPertanyaan');
        const formOpsi = document.querySelector('#opsiEdit');
        const formTipe = document.querySelector('#editTipe');
        const formMandatory = document.querySelector('#mandatoryCheckEdit');
        const btnEdit = document.querySelectorAll('.btn-edit-question');

        btnEdit.forEach(btnE => {
            btnE.addEventListener('click', (e) => {
                formTipe.value = e.target.dataset.tipe
                formID.value = e.target.dataset.unique
                formOpsi.value = e.target.dataset.opsi
                formPertanyaan.value = e.target.dataset.quest
                if (e.target.dataset.wajib == "1") {
                    formMandatory.checked = true;
                } else {
                    formMandatory.checked = false;
                }
            })
        });

    </script>
@endsection
