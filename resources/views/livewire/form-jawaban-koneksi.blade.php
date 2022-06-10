<div class="form-show__content-body form-show__content-body--jawaban">
    <div class="form-show__jawaban-filter">
        <div class="form__group">
            <label for="filter-by" class="form__label">Urutkan berdasarkan</label>
            <select wire:model="filterkey" name="filter-by" id="filter-by" class="form__control">
                <option value="" disabled selected>Urutkan berdasarkan</option>
                @foreach ($pertanyaan as $per)
                    <option value="{{ $per->id }}">{{ $per->pertanyaan }}</option>
                @endforeach
            </select>
        </div>

        <div class="form__group">
            <label for="value-by" class="form__label">Urutkan berdasarkan</label>
            @if ($filtertype == 'select')
                <select name="" id="value-by" class="form__control" wire:model="filterval">
                    <option value="" disabled selected>value-filter</option>
                    @foreach ($filteropt as $f)
                        <option value="{{ $f }}">{{ $f }}</option>
                    @endforeach
                </select>
            @elseif($filtertype == 'checkbox')
            @else
                <input id="value-by" wire:model="filterval" type="{{ $filtertype ? $filtertype : 'text' }}"
                    class="form__control" placeholder="value">
            @endif
        </div>

        <a wire:click="dofilter" class=" button btn-primary">Cari</a>

        @if ($filter)
            <a wire:click="resetfilter" class="button btn-secondary" href="#">Reset Filter</a>
        @endif
    </div>

    @if ($filter)
        @if (sizeof($jawaban) == 0)
            <h4 class="form-show__tidak-sesuai">
                tidak ada data sesuai
            </h4>
        @else
            <h4 class="form-show__sesuai">
                Jumlah data diperoleh : {{ sizeof($jawaban) }} data
            </h4>
            @foreach ($jawaban as $j)
                <div class="form-show__responden">
                    <p class="form-show__responden-label">{{ $loop->iteration }}</p>
                    @foreach ($j->penjawab->jawaban as $jaw)
                        <div class="form-show__responden-row">
                            <p class="form-show__responden-label">{{ $jaw->pertanyaan->pertanyaan }}</p>
                            <p class="form-show__responden-value">{{ $jaw->jawaban }}</p>
                        </div>
                    @endforeach
                </div>
            @endforeach
        @endif
    @else
        <h4 class="form-show__sesuai">
            Jumlah data diperoleh : {{ sizeof($penjawab) }} data
        </h4>
        @foreach ($penjawab as $p)
            <div class="form-show__responden">
                <p class="form-show__responden-label">{{ $loop->iteration }}</p>
                @foreach ($p->jawaban as $jawaban)
                    <div class="form-show__responden-row">
                        <p class="form-show__responden-label">{{ $jawaban->pertanyaan->pertanyaan }}</p>
                        <p class="form-show__responden-value">{{ $jawaban->jawaban }}</p>
                    </div>
                @endforeach
            </div>
        @endforeach
    @endif
</div>
