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
                @foreach ($result->jawaban as $jaw)
                    <div class="form-group">
                        <label for="">{{ $jaw->pertanyaan->pertanyaan }}</label>
                        <input disabled type="text" class="form-control" id="" value="{{ $jaw->jawaban }}">
                    </div>
                @endforeach
            @endif
        </div>

    </div>
</div>
