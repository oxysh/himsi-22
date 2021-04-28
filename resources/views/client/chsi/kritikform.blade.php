@extends('template.bootstrap.client')

@section('title')
    Kritik Saran HIMSI
@endsection

@section('content')
    <div class="container my-4">
        <div class="row">
            <h1 class="display-4">Kritik dan Saran untuk {{ $bidang }}</h1>
        </div>

        <div class="row">
            <form action="{{ route('kritik.submit') }}" class="col-12" method="post">
                @csrf
                <input type="hidden" name="bidang" value="{{ $bidang }}">
                <div class="form-group">
                    <label for="textarea-kritik">Kritik dan Saran Anda</label>
                    <textarea name="krisar" class="form-control" id="textarea-kritik" rows="3"></textarea>
                </div>
                <button type="submit" class="btn btn-primary">Kirim</button>
            </form>
        </div>
    </div>
@endsection
