<div class="row my-4">
    <div class="col">
        <div class="row">
            <h2>Jawaban Form</h2>
        </div>
        <div class="row">
            {{-- <div class="form-group align-self-end">
                <button class="btn btn-primary" type="button" data-toggle="collapse" data-target="#infoJawaban"
                    aria-expanded="false" aria-controls="infoJawaban">List Jawaban</button>
            </div> --}}
            <div class="form-group mx-4">
                <label for="filterkey">filter by</label>
                <select wire:model="filterkey" class="form-control" id="filterkey">

                    <option value="">--pilih opsi--</option>
                    @foreach ($pertanyaan as $per)
                        <option value="{{ $per->id }}">{{ $per->pertanyaan }}</option>
                    @endforeach
                </select>
            </div>
            <div class="form-group mx-4">
                <label for="filterval">Value {{ $filtertype }} </label>
                @if ($filtertype == 'select')
                    <select class="form-control" wire:model="filterval" id="">
                        @foreach ($filteropt as $f)
                            <option value="{{ $f }}">{{ $f }}</option>
                        @endforeach
                    </select>
                @elseif($filtertype == 'checkbox')

                @else
                    <input wire:model="filterval" type="{{ $filtertype ? $filtertype : 'text' }}" class="form-control"
                        id="filterval" aria-describedby="emailHelp">
                @endif
            </div>
            <div class="form-group align-self-end">
                <button wire:click="dofilter" class="btn btn-success">
                    Set Filter
                </button>
                @if ($filter)
                    <a wire:click="resetfilter" href="#">Reset Filter</a>
                @endif

            </div>
        </div>
        <div class="" id="infoJawaban">

            @if ($filter)
                @if (sizeof($jawaban) == 0)
                    <div class="alert alert-danger" role="alert">
                        tidak ada data sesuai
                    </div>
                @else
                    <div class="alert alert-success" role="alert">
                        Jumlah data diperoleh : {{ sizeof($jawaban) }} data
                    </div>
                    {{-- {{ dd($jawaban) }} --}}
                    @foreach ($jawaban as $j)
                        <div class="card card-body my-3">
                            <p>
                                <strong>TOKEN</strong> : {{ $j->penjawab->token }} <br>
                                @foreach ($j->penjawab->jawaban as $jaw)
                                    <strong>{{ $jaw->pertanyaan->pertanyaan }}</strong> : {{ $jaw->jawaban }}
                                    <br>
                                @endforeach
                            </p>
                        </div>
                    @endforeach
                @endif

            @else
                <div class="alert alert-success" role="alert">
                    Jumlah data diperoleh : {{ sizeof($penjawab) }} data
                </div>
                @foreach ($penjawab as $p)
                    <div class="card card-body my-3">
                        <p>
                            <strong>TOKEN</strong> : {{ $p->token }} <br>
                            @foreach ($p->jawaban as $jawaban)
                                <strong>{{ $jawaban->pertanyaan->pertanyaan }}</strong> : {{ $jawaban->jawaban }}
                                <br>
                            @endforeach
                            <a href="{{route('form.penjawab.edit', [$formid,$p->id])}}">Ubah Jawaban</a>
                        </p>
                    </div>
                @endforeach
            @endif

        </div>
    </div>
</div>
