@extends('template.cakrawala.admin.template')

@section('title')
List Curhat
@endsection

@section('extracss')
    <link rel="stylesheet" href="{{ url('assets/css/form-list.css') }}">
    <link rel="stylesheet" href="{{ url('assets/css/chsi-admin-index.css') }}">
@endsection

@section('content')
    <span class="h2">Form list</span>
    <div class="button-group">
        <select type="text" name="" id="event-filter" class="form-control">
            <option value="a" selected>tampilkan semua</option>
            <option value="b">tanpa respon</option>
            <option value="c">dengan respon (semua)</option>
            <option value="d">dengan respon (belum diakhiri)</option>
            <option value="e">dengan respon (menunggu balasan)</option>
            <option value="f">dengan respon (sudah diakhiri)</option>
        </select>
    </div>
    <div class="grid-system">
        @foreach ($data as $curhat)

            <div class="card {{ $curhat->dibalas ? 'balas' : '' }}"
                data-link="{{ route('chsi.admin.curhat.chat', $curhat->token) }}">
                <div class="card-body p">
                    <span class="card-title">{{ $curhat->token }}</span>
                    <span class="">
                        @if ($curhat->dibalas)
                            DENGAN BALASAN
                            @if ($curhat->selesai)
                                <span class="status finished">Selesai</span>
                            @else
                                @if ($curhat->nunggu)
                                    <span class="status waiting">Menunggu Balasan</span>
                                @else
                                    <span class="status unfinished">On Progress</span>
                                @endif
                            @endif
                        @else
                            TANPA BALASAN
                            <span class="finished">Selesai</span>
                        @endif
                    </span>
                </div>
                <div class="card-line">
                </div>
            </div>
        @endforeach

    </div>
@endsection

@section('extrajs')
    <script src="{{ url('assets/js/form-list.js') }}"></script>
    <script>
        document.querySelector('#nav-chsi').classList.add('selected');

        const listcard = document.querySelectorAll('.card');
        const eventfilter = document.querySelector('#event-filter');

        eventfilter.addEventListener('change', () => {
            switch (eventfilter.value) {
                case 'a':
                    console.log('display all');
                    listcard.forEach(element => {
                        element.style.display = 'flex';
                    });
                    break;
                case 'b':
                    console.log('tanpa respon');
                    listcard.forEach(element => {
                        element.style.display = 'none';
                        if (!element.classList.contains('balas')) {
                            element.style.display = 'flex';
                        }
                    });
                    break;
                case 'c':
                    console.log('dengan respon semua');
                    listcard.forEach(element => {
                        element.style.display = 'none';
                        if (element.classList.contains('balas')) {
                            element.style.display = 'flex';
                        }
                    });
                    break;
                case 'd':
                    console.log('dengan respon belum akhir');
                    listcard.forEach(element => {
                        element.style.display = 'none';
                        if (element.classList.contains('balas')) {
                            const liststatus = element.querySelectorAll('.status');
                            liststatus.forEach(status => {
                                if (status.classList.contains('unfinished')) {
                                    element.style.display = 'flex';
                                }
                            });
                        }
                    });
                    break;
                case 'e':
                    console.log('dengan respon menunggu balas');
                    listcard.forEach(element => {
                        element.style.display = 'none';
                        if (element.classList.contains('balas')) {
                            const liststatus = element.querySelectorAll('.status');
                            liststatus.forEach(status => {
                                if (status.classList.contains('waiting')) {
                                    element.style.display = 'flex';
                                }
                            });
                        }
                    });
                    break;
                case 'f':
                    console.log('dengan respon sudah berakhir');
                    listcard.forEach(element => {
                        element.style.display = 'none';
                        if (element.classList.contains('balas')) {
                            const liststatus = element.querySelectorAll('.status');
                            liststatus.forEach(status => {
                                if (status.classList.contains('finished')) {
                                    element.style.display = 'flex';
                                }
                            });
                        }
                    });
                    break;

                default:
                    break;
            }
        })
    </script>
@endsection
