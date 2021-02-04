<div class="container">
    <div class="row justify-content-center mt-5">
        <div class="col-12 col-md-6 col-lg-4 text-center">
            <form class="form-inline my-2 my-lg-0">
                <input wire:model="token" class="form-control mr-sm-2" type="text" placeholder="Token"
                    aria-label="Search">
                <button wire:click="cari" class="btn btn-success my-2 my-sm-0" type="button">Cari</button>
            </form>
        </div>
    </div>

    <div class="row my-5 justify-content-center">
        <div class="col-12 col-md-6">


            @if ($result == null)
                <div class="my-4">
                    <h3>Masukkan token anda dan lakukan pencarian </h3>
                </div>
            @else
                <div class="my-4">
                    <h3>Hasil Form {{ $result->form->judul }} </h3>
                </div>

                {{-- @if ($p_lolos == "ya")
                    <div class="my-2">
                        <div class="alert alert-success" role="alert">
                            Selamat Anda menjadi bagian dari kepengurusan HIMSI 2021 <br>
                            Anda diterima pada bidang : {{$p_bidang}} <br>
                            segera hubungi kabid melalui LINE : {{$p_line}}
                        </div>

                    </div>
                @else
                    <div class="my-2">
                        <div class="alert alert-danger" role="alert">
                            Mohon Maaf anda belum menjadi bagian dari kepengurusan HIMSI 2021 <br>
                            Tetap Semangat dan ikuti Program dan Agenda HIMSI 2021 <br>
                            Anda masih punya kesempatan menjadi bagian dari Kepanitiaan Program HIMSI 2021
                        </div>
                    </div>
                @endif --}}
                
                @foreach ($result->jawaban as $jaw)
                    @if (!in_array($jaw->pertanyaan->id, [5, 6, 7]))
                        <div class="form-group">
                            <label for="">{{ $jaw->pertanyaan->pertanyaan }}</label>
                            <input disabled type="text" class="form-control" id="" value="{{ $jaw->jawaban }}">
                        </div>

                    @endif
                @endforeach
            @endif
        </div>

    </div>
</div>
