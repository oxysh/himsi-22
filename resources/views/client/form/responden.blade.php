@extends('template.cakrawala.client.template')

@section('title')
    {{ $form->judul }}
@endsection

@section('extracss')
<style>
    .h2 {
        padding: 10px 0 !important;
    }
    .content {
        padding: 0px 10px 10px 10px !important;
    }
</style>
@endsection

@section('content')
    <form action="{{ route('form.bitly.submit', $bitly) }}" method="POST" class="form-feature">
        @csrf
        <input type="hidden" name="formid" value="{{ $form->id }}">

        <!-- Judul Form -->
        <span class="h2">{{ $form->judul }}</span>
        <!-- pilihan alert = info; primary; success; danger -->
        <div class='alert alert-warning-form'>Mohon isi Kolom Wajib</div>

        <!-- Isi Form -->
        @if ($form->deskripsi != '')
            <div class="form-group">
                <p>{{ $form->deskripsi }}</p>
            </div>
        @endif

        @foreach ($form->pertanyaan as $p)
            <div class="form-group">
                <label for="{{ 'form-input-' . $p->id }}">{{ $p->pertanyaan }} <span
                        class="caption">{{ $p->mandatory ? '*wajib' : '' }}</span> </label>
                @switch($p->tipe)
                    @case('select')
                        <select class="form-control {{ $p->mandatory ? '' : 'not-required-validate' }} "
                            name="{{ $p->id }}" id="{{ 'form-input-' . $p->id }}"
                            data-error="{{ '#form-error-' . $p->id }}">
                            <option value="" disabled selected>pilih</option>
                            @foreach ($p->opsi as $o)
                                <option value="{{ $o }}">{{ $o }}</option>
                            @endforeach
                        </select>
                    @break
                    @case('textarea')
                        <textarea name="{{ $p->id }}" id="{{ 'form-input-' . $p->id }}"
                            class="form-control {{ $p->mandatory ? '' : 'not-required-validate' }}" cols="" rows="3"
                            data-error="{{ '#form-error-' . $p->id }}"></textarea>

                    @break
                    @default
                        <input type="{{ $p->tipe }}" name="{{ $p->id }}"
                            class="form-control {{ $p->mandatory ? '' : 'not-required-validate' }}"
                            placeholder="{{ $p->pertanyaan }}" id="{{ 'form-input-' . $p->id }}"
                            data-error="{{ '#form-error-' . $p->id }}">

                @endswitch

                <small class="form-error caption hide" id="form-error-{{ $p->id }}"></small>
            </div>
        @endforeach
        <!-- Akhir isi form -->

        <!-- Submit Button -->
        <div class="form-group submit">
            <button type="submit" class="btn btn-primary">Submit<img src="{{ url('assets/img/send.svg') }}"
                    alt=""></button>
        </div>
    </form>
@endsection

@section('modal')

@endsection

@section('extrajs')
<script>
    document.querySelector('#nav-new-feature').classList.add('selected');
    var btnsubmit = document.querySelector('button[type=submit]');
    var formnya = document.querySelector('form');
    console.log(formnya);
    btnsubmit.addEventListener('click', (e) => {
        e.preventDefault();
        if (validation(formnya)) {
            formnya.submit();
        }
    })

</script>
@endsection
