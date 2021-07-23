@extends('template.cakrawala.admin.template')

@section('title')
    CHSI - Curhat
@endsection
@section('extracss')
    <link rel="stylesheet" href="{{ url('assets/css/krisar-admin.css') }}" />

@endsection
@section('content')
    <h1>Kritik <span id="orange">dan</span> Saran</h1>
    <div class="list">

        @if (count($krisar) < 1)
            <div class="alert alert-danger" role="alert">
                Data tidak ditemukan
            </div>
        @else

            @foreach ($krisar as $item)
                <div class="kritik" data-long="{{ $item->krisar }}">
                    <p>{{ $item->krisar }}</p>
                    <div class="info">
                        <span class="more caption">Click for more</span>
                        <span class="date caption">{{ $item->created_at }}</span>
                    </div>
                </div>
            @endforeach

        @endif
    </div>
@endsection

@section('modal')
    <div class="modal" id="kritik-saran">
        <div class="close-overlay"></div>
        <div class="modal-content">
            <h1>Kritik dan Saran untuk
                <span id="kritik-bidang">BIDANG</span>
            </h1>
            <p>Lorem ipsum dolor sit amet consectetur adipisicing elit. Animi commodi expedita illum totam aperiam
                sunt neque ipsam quasi delectus iste, fugiat, aliquid inventore voluptate laudantium, cumque
                maiores voluptas iusto nostrum sit. Minima porro alias ratione aliquam fugit aperiam ullam a
                distinctio enim, eum, culpa excepturi in officiis sed magni quos vero soluta animi dolore
                voluptatum rerum assumenda blanditiis voluptatibus? Tempore odit aspernatur praesentium incidunt
                ratione unde, magnam obcaecati voluptatibus mollitia tempora aperiam molestiae. Eaque,
                temporibus nemo, dolorem cum odio aliquid itaque, fugiat suscipit ex asperiores sint officia
                impedit. Nostrum nisi maiores distinctio? Non officia laborum enim recusandae in excepturi
                laudantium?</p>
        </div>
    </div>
@endsection

@section('extrajs')
    <script>
        const kritik = document.querySelectorAll('.kritik');
        const modalKritik = document.querySelector('.modal#kritik-saran');
        kritik.forEach(kr => {
            kr.addEventListener('click', () => {
                modalKritik.classList.add('active');
                modalKritik.querySelector('p').innerHTML = kr.dataset.long
            })
            var a = kr.querySelector('p').innerText.split(' ').slice(0, 10).join(' ') + '...';
            kr.querySelector('p').innerHTML = a;
        });

        modalKritik.querySelector('.close-overlay').addEventListener('click', () => {
            modalKritik.classList.remove('active');
        })
    </script>
@endsection
