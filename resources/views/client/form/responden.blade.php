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

        .nav {
            position: fixed;
            top: 0;
            box-shadow: -29px 30px 30px rgba(155, 151, 151, 0.1);
            background: rgba(255, 255, 255, 0.2);
            backdrop-filter: blur(.5rem);
        }

        .nav-mobile {
            background: transparent;
        }

        .nav .nav-item.active,
        .nav .dropdown:hover .dropbtn,
        .nav .dropdown.selected .dropbtn {
            color: #3F8EFC;
        }

        @media screen and (max-width: 500px) {
            .nav-group {
                background: rgba(255, 255, 255);
                border-color: #3F8EFC
            }
        }

        .content {
            margin-top: 5rem
        }

    </style>
    <link rel="stylesheet" href="{{ url('assets/scss/app.css') }}">
@endsection

@section('content')
    <form action="{{ route('form.bitly.submit', $bitly) }}" method="POST" class="form-feature">
        @csrf
        <input type="hidden" name="formid" value="{{ $form->id }}">

        <!-- Judul Form -->
        <span class="h3">{{ $form->judul }}
            <!-- Isi Form -->
            @if ($form->deskripsi != '')
                <div class="form-group">
                    <p>{{ $form->deskripsi }}</p>
                </div>
            @endif
        </span>
        <!-- pilihan alert = info; primary; success; danger -->
        <div class='alert alert-warning-form'>Mohon isi Kolom Wajib</div>


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
    <img src="{{ url('assets/image/oprec-22/form-lg.svg') }}" alt="" class="form__img form__img--lg">
    <img src="{{ url('assets/image/oprec-22/form-sm.svg') }}" alt="" class="form__img form__img--sm">
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
