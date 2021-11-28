@extends('template.cakrawala.admin.template')

@section('title')
    PSDM - KRITIK SARAN
@endsection

@section('extracss')
    <link rel="stylesheet" href="{{ url('assets/css/krisar-index.css') }}" />

@endsection

@section('content')
    <div class="head">
        <div class="text">
            <h1>Kritik <span id="orange">dan</span> Saran</h1>
            <span>Lorem ipsum dolor sit amet consectetur, adipisicing elit. Inventore
                ipsam quos laboriosam unde vel at dolorem natus dicta adipisci,
                nihil quam ad minus nam quis neque, reprehenderit saepe repellendus
                impedit.</span>
        </div>
        <img src="img/krisar-msg.png" alt="" srcset="" />
    </div>
    <div class="list">
        <h1>List Bidang (12)</h1>
        <div class="list-item">
            <div class="thumb-item" data-bidang="psdm">
                <div class="outline">
                    <img src="https://source.unsplash.com/400x400/?nature,water" alt="" />
                    <span>PSDM</span>
                </div>
            </div>
            <div class="thumb-item" data-bidang="ristek">
                <div class="outline">
                    <img src="https://source.unsplash.com/401x401/?nature,water" alt="" />
                    <span>RISTEK</span>
                </div>
            </div>
            <div class="thumb-item" data-bidang="sera">
                <div class="outline">
                    <img src="https://source.unsplash.com/402x402/?nature,water" alt="" />
                    <span>SERA</span>
                </div>
            </div>
            <div class="thumb-item" data-bidang="hublu">
                <div class="outline">
                    <img src="https://source.unsplash.com/403x403/?nature,water" alt="" />
                    <span>HUBLU</span>
                </div>
            </div>
            <div class="thumb-item" data-bidang="akademik">
                <div class="outline">
                    <img src="https://source.unsplash.com/404x404/?nature,water" alt="" />
                    <span>AKADEMIK</span>
                </div>
            </div>
            <div class="thumb-item" data-bidang="kestari">
                <div class="outline">
                    <img src="https://source.unsplash.com/405x405/?nature,water" alt="" />
                    <span>KESTARI</span>
                </div>
            </div>
            <div class="thumb-item" data-bidang="bph">
                <div class="outline">
                    <img src="https://source.unsplash.com/406x406/?nature,water" alt="" />
                    <span>BPH</span>
                </div>
            </div>
            <div class="thumb-item" data-bidang="media">
                <div class="outline">
                    <img src="https://source.unsplash.com/407x407/?nature,water" alt="" />
                    <span>MEDIA</span>
                </div>
            </div>
        </div>
    </div>
@endsection

@section('modal')
    <div class="modal" id="info-bidang">
        <div class="close-overlay"></div>
        <div class="modal-content kritik-content">
            <h1 id="nama-bidang">SERA</h1>

        </div>
    </div>
    <div class="modal" id="kritik-saran">
        <div class="close-overlay"></div>
        <div class="modal-content">
            <h1>Kritik dan Saran untuk</h1>
            <h1 id="kritik-bidang"></h1>
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
    <template class="kritik" style="display: none;">
        <p>Lorem ipsum dolor sit amet consectetur, adipisicing elit. Earum aut ullam non facere nobis
            eum consequatur est distinctio facilis rerum!</p>
        <div class="info">
            <span class="more">Click for more</span>
            <span class="date">2021-07-19 12:13 WIB</span>
        </div>
    </template>
@endsection

@section('extrajs')
    <script>
        const data = {
            ristek: [
                @foreach ($RISTEK as $k)
                    {
                    kritik: `{{ $k->krisar }}`,
                    tanggal: `{{ $k->created_at }}`
                    },
                @endforeach
            ],
            psdm: [
                @foreach ($PSDM as $k)
                    {
                    kritik: `{{ $k->krisar }}`,
                    tanggal: `{{ $k->created_at }}`
                    },
                @endforeach
            ],
            sera: [
                @foreach ($SERA as $k)
                    {
                    kritik: `{{ $k->krisar }}`,
                    tanggal: `{{ $k->created_at }}`
                    },
                @endforeach
            ],
            hublu: [
                @foreach ($HUBLU as $k)
                    {
                    kritik: `{{ $k->krisar }}`,
                    tanggal: `{{ $k->created_at }}`
                    },
                @endforeach
            ],
            akademik: [
                @foreach ($AKADEMIK as $k)
                    {
                    kritik: `{{ $k->krisar }}`,
                    tanggal: `{{ $k->created_at }}`
                    },
                @endforeach
            ],
            kestari: [
                @foreach ($KESTARI as $k)
                    {
                    kritik: `{{ $k->krisar }}`,
                    tanggal: `{{ $k->created_at }}`
                    },
                @endforeach
            ],
            bph: [
                @foreach ($BPH as $k)
                    {
                    kritik: `{{ $k->krisar }}`,
                    tanggal: `{{ $k->created_at }}`
                    },
                @endforeach
            ],
            media: [
                @foreach ($MEDIA as $k)
                    {
                    kritik: `{{ $k->krisar }}`,
                    tanggal: `{{ $k->created_at }}`
                    },
                @endforeach
            ],
        }
        const templatekritik = document.querySelector('template.kritik');
        const list = document.querySelectorAll('.thumb-item');
        const modalInfo = document.querySelector('.modal#info-bidang');
        const modalform = document.querySelector('.modal#kritik-saran');
        let dataselected = {};
        const seedKritik = (data, namabidang) => {
            data.forEach(kritik => {
                var a = document.createElement('div');
                a.classList.add('kritik');
                a.innerHTML = templatekritik.innerHTML;
                // console.log(a);
                a.style.display = 'flex';
                var b = kritik.kritik.split(' ').slice(0, 10).join(' ') + '...';
                a.querySelector('p').innerHTML = b
                a.querySelector('.date').innerHTML = kritik.tanggal
                a.addEventListener('click', () => {
                    showModalForm(namabidang, kritik.kritik)
                })
                modalInfo.querySelector('.modal-content').append(a);
            });
        }
        const showModalForm = (namabidang, kritik) => {
            setTimeout(() => {
                modalInfo.classList.remove('active');
                modalform.classList.add('active');
                modalform.querySelector('#kritik-bidang').innerHTML = namabidang;
                modalform.querySelector('p').innerHTML = kritik
            }, 500)
        }
        list.forEach(item => {
            item.addEventListener('click', () => {
                // display modal
                modalInfo.classList.add('active');
                modalInfo.querySelector('.modal-content').scrollTop = 0

                // no scroll
                document.querySelector('body').style.overflow = 'hidden';

                // remove old element
                document.querySelectorAll('.kritik').forEach(el => {
                    el.remove();
                })
                modalInfo.querySelector('#nama-bidang').innerHTML = 'HIMSI';
                switch (item.dataset.bidang) {
                    case 'ristek':
                        modalInfo.querySelector('#nama-bidang').innerHTML = 'RISTEK';
                        seedKritik(data.ristek, 'RISTEK')
                        break;
                    case 'psdm':
                        modalInfo.querySelector('#nama-bidang').innerHTML = 'PSDM';
                        seedKritik(data.psdm, 'PSDM')
                        break;
                    case 'sera':
                        modalInfo.querySelector('#nama-bidang').innerHTML = 'sera';
                        seedKritik(data.sera, 'sera')
                        break;
                    case 'hublu':
                        modalInfo.querySelector('#nama-bidang').innerHTML = 'hublu';
                        seedKritik(data.hublu, 'hublu')
                        break;
                    case 'akademik':
                        modalInfo.querySelector('#nama-bidang').innerHTML = 'akademik';
                        seedKritik(data.akademik, 'akademik')
                        break;
                    case 'kestari':
                        modalInfo.querySelector('#nama-bidang').innerHTML = 'kestari';
                        seedKritik(data.kestari, 'kestari')
                        break;
                    case 'bph':
                        modalInfo.querySelector('#nama-bidang').innerHTML = 'bph';
                        seedKritik(data.bph, 'bph')
                        break;
                    case 'media':
                        modalInfo.querySelector('#nama-bidang').innerHTML = 'media';
                        seedKritik(data.media, 'media')
                        break;

                    default:
                        break;
                }
            })
        });
        document.querySelector('#info-bidang .close-overlay').addEventListener('click', (e) => {
            e.target.parentElement.classList.remove('active')
            document.querySelector('body').style.overflowX = 'scroll';
        })
        document.querySelector('#kritik-saran .close-overlay').addEventListener('click', (e) => {
            e.target.parentElement.classList.remove('active')
            modal.classList.add('active');
        })
    </script>
@endsection
