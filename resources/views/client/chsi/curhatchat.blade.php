@extends('template.bootstrap.client')

@section('title')
    CHSI
@endsection

@section('content')
    <div class="container">
        <div class="col-12">

            <div class="row mt-4">
                <div class="col-12">
                    <p class="h1">BRUH</p>
                </div>
            </div>

            <div class="row mt-4">

                <div class="col-12 border border-dark">
                    <div class="row my-2 d-flex justify-content-start">
                            <div class="mx-2">
                                <img src="{{url('assets/image/logo.png')}}" style="width: 50px;" class="img-fluid img-thumbnail rounded" alt="...">
                            </div>
                            <div class="p-2 rounded border border-success bg-success col-10">Lorem ipsum dolor sit amet consectetur adipisicing elit. Quidem inventore dolor aliquam cupiditate qui, distinctio omnis blanditiis debitis tempore iste maxime. Tempora eaque doloribus harum omnis officia cumque suscipit porro eligendi eius ducimus maxime, repellendus recusandae maiores itaque, at sequi saepe perferendis minima. Totam cupiditate incidunt est neque culpa sunt?</div>
                    </div>
                    <div class="row my-2 d-flex justify-content-end">
 
                            <div class="p-2 rounded border border-primary bg-light col-10">Lorem ipsum dolor sit amet consectetur adipisicing elit. Pariatur nihil non sapiente nostrum iste cumque autem, repellat aut atque error!
                                Lorem ipsum dolor sit amet, consectetur adipisicing elit. Culpa architecto incidunt sapiente tempore nesciunt odit vero excepturi porro nobis cumque quasi aperiam repudiandae, veritatis quisquam blanditiis inventore in ratione possimus.
                                Lorem ipsum dolor sit, amet consectetur adipisicing elit. Voluptate eos rerum deleniti possimus impedit, placeat debitis quibusdam doloribus illo doloremque?
                            </div>
                            <div class="mx-2">
                                <img src="{{url('assets/image/logo.png')}}" style="width: 50px;" class="img-fluid img-thumbnail rounded" alt="...">
                            </div>
                    </div>
                </div>
            </div>

            <div class="row mt-4">
                <form class="col-12" method="POST" action="{{ route('curhat.submit') }}">
                    @csrf
                    <div class="form-group">
                        <label for="curhat">Your Message</label>
                        <textarea name="curhatan" class="form-control" id="curhat" rows="3"></textarea>
                    </div>
                    <button type="submit" class="btn btn-primary">Kirim Chat</button>
                    <a href="{{route('curhat.finish')}}" class="ml-2 btn btn-warning">Akhiri Chat</a>
                </form>
            </div>

        </div>

    </div>


    </div>
    </div>
@endsection
