@extends('template.bootstrap.client')

@section('title')
    CHSI
@endsection

@section('content')
    <div class="container">
        <div class="col-12">

            <div class="row mt-4">
                <form class="col-12" method="POST" action="{{ route('curhat.submit') }}">
                    @csrf
                    <div class="form-group">
                        <label for="curhat">Curhatan Anda</label>
                        <textarea name="curhatan" class="form-control" id="curhat" rows="3"></textarea>
                        <small id="curhatHelp" class="form-text text-muted">We'll never share your curhat with anyone
                            else.</small>
                    </div>

                    <div class="form-group form-check">
                        <input name="respon" type="checkbox" class="form-check-input" id="responchecked">
                        <label class="form-check-label" for="responchecked">ingin mendapatkan respon</label>
                    </div>

                    <button type="submit" class="btn btn-primary">Submit</button>
                </form>

            </div>

        </div>
    </div>
@endsection
