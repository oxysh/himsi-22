<div class="table-jawaban">
    <div class="button-group">
        <div class="input-group">
            <label for="filter-by">filter-by</label>
            <select wire:model="filterkey" name="" id="filter-by" class="form-control">
                <option value="" disabled selected>filter-by</option>
                @foreach ($pertanyaan as $per)
                    <option value="{{ $per->id }}">{{ $per->pertanyaan }}</option>
                @endforeach
            </select>
        </div>
        <div class="input-group">
            <label for="value-by">Value Filter {{ $filtertype }}</label>
            @if ($filtertype == 'select')
                <select name="" id="value-by" class="form-control hide" wire:model="filterval">
                    <option value="" disabled selected>value-filter</option>
                    @foreach ($filteropt as $f)
                        <option value="{{ $f }}">{{ $f }}</option>
                    @endforeach
                </select>
            @elseif($filtertype == 'checkbox')

            @else
                <input id="value-by" wire:model="filterval" type="{{ $filtertype ? $filtertype : 'text' }}"
                    class="form-control" placeholder="value">
            @endif


        </div>
        <a wire:click="dofilter" class="btn-primary">Cari</a>
        @if ($filter)
            <a wire:click="resetfilter" class="alert-warning-form" href="#">Reset Filter</a>
        @endif
        {{-- <div class="input-group">
            <label for="show-by">show-by</label>
            <select name="" id="show-by" class="form-control">
                <option value="5" selected>5</option>
                <option value="10">10</option>
                <option value="20">20</option>
            </select>
        </div> --}}
    </div>

    @if ($filter)
        @if (sizeof($jawaban) == 0)
            <div class="alert alert-danger-form">
                tidak ada data sesuai
            </div>
        @else
            <div class="alert alert-success-form">
                Jumlah data diperoleh : {{ sizeof($jawaban) }} data
            </div>
            {{-- {{ dd($jawaban) }} --}}
            @foreach ($jawaban as $j)
                <div class="jawaban-row">
                    <span>{{ $loop->iteration }}</span>
                    <span class="p">
                        @foreach ($j->penjawab->jawaban as $jaw)
                            <strong>
                                {{ $jaw->pertanyaan->pertanyaan }} :
                            </strong>
                            {{ $jaw->jawaban }}
                        @endforeach
                    </span>
                </div>
            @endforeach
        @endif
    @else
        <div class="alert alert-success-form">
            Jumlah data diperoleh : {{ sizeof($penjawab) }} data
        </div>
        @foreach ($penjawab as $p)
            <div class="jawaban-row">
                <span>{{ $loop->iteration }}</span>
                @foreach ($p->jawaban as $jawaban)

                    <span class="p"><strong>{{ $jawaban->pertanyaan->pertanyaan }} :
                        </strong>{{ $jawaban->jawaban }}</span>
                @endforeach
            </div>
        @endforeach
    @endif

    <div class="pagination hide" id="jawaban-row-pagination">

    </div>
</div>
