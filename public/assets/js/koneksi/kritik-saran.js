const data = {
    "bph": {
        "nama" : "Badan Pengurus Harian",
        "akronim": "BPH",
        "desc": "Badan Pengurus Harian (BPH) merupakan badan yang melakukan fungsi kontrol, koordinasi, dan bertanggung jawab dalam sistem manajemen administrasi dan keuangan serta komunikasi dalam membbangun hubungan internal dan eksternal kepengurusan."
    },

    "kestari": {
        "nama" : "Kewirausahaan dan Inventaris",
        "akronim": "Kestari",
        "desc": "Bidang KESTARI merupakan bidang yang bertanggung jawab atas kegiatan kewirausahaan dalam menambah pemasukan kas HIMSI serta pengelolaan sarana dan prasarana di kesekretariatan HIMSI UNAIR."
    },

    "psdm": {
        "nama" : "Pengembangan Sumber Daya Mahasiswa",
        "akronim": "PSDM",
        "desc": "Bidang PSDM merupakan salah satu bidang yang mempunyai peran penting dalam koordinasi maupun optimalisasi terhadap sumber daya mahasiswa S1 Sistem Informasi UNAIR. Bidang PSDM terdiri dari 2 divisi yang mempunyai fokusnya masing-masing, yaitu Divisi Kaderisasi dan Divisi Personalia."
    },

    "hublu": {
        "nama" : "Hubungan Luar",
        "akronim": "Hublu",
        "desc": "Bidang Hubungan Luar (Hublu) merupakan bidang yang mempunyai tanggung jawab dalam menjembatani pihak eksternal dengan internal HIMSI Unair. Hublu bertugas menerima informasi yang kemudian diolah, serta disebarkan ke ranah internal maupun eksternal sehingga hal ini membuat Hublu menjadi pintu informasi utama di HIMSI Unair."
    },

    "sera": {
        "nama" : "Seni dan Olahraga",
        "akronim": "Sera",
        "desc": "Bidang Sera merupakan bidang yang bertanggung jawab untuk mewadahi dan memfasilitasi minat dan bakat warga S1 Sistem Informasi UNAIR di bidang non akademik khususnya dalam seni dan olahraga."
    },
    
    "media": {
        "nama" : "Media",
        "akronim": "Media",
        "desc": "Bidang Media merupakan bidang yang bertanggung jawab atas segala bentuk editing desain grafis, video, dan audio serta bertanggung jawab atas pengelolaan media sosial HIMSI UNAIR sebagai sarana informasi untuk warga S1 Sistem Informasi UNAIR dan pihak eksternal."
    },

    "akademik": {
        "nama" : "Akademik",
        "akronim": "Akademik",
        "desc": "Bidang akademik merupakan bidang yang bekerja dalam lingkup peningkatan kualitas akademik dan pendampingan dalam pengembangan prestasi mahasiswa S1 Sistem Informasi UNAIR."
    },

    "ristek": {
        "nama" : "Riset dan Teknologi",
        "akronim": "Ristek",
        "desc": "Bidang Ristek merupakan bidang yang berperan dalam mengembangkan minat dan bakat di bidang teknologi, menyediakan wadah informasi seputar keprofesian serta memotivasi mahasiswa S1 Sistem Informasi Unair."
    },
}


$('.krisar__card').click(e => {
    $('.krisar__dialog')[0].classList.add('active')
    $('.dialog__bg')[0].classList.add('active')
 
    switch (e.currentTarget.dataset.bidang) {
        case 'bph':
            $('.krisar__dialog-title')[0].innerHTML = data.bph.nama;
            $('.krisar__dialog-desc')[0].innerHTML = data.bph.desc;
            $('.krisar__dialog-akronim')[0].innerHTML = data.bph.akronim;
            $('#kritik-nama-bidang')[0].value = 'BPH';
            break;
        case 'kestari':
            $('.krisar__dialog-title')[0].innerHTML = data.kestari.nama;
            $('.krisar__dialog-desc')[0].innerHTML = data.kestari.desc;
            $('.krisar__dialog-akronim')[0].innerHTML = data.kestari.akronim;
            $('#kritik-nama-bidang')[0].value = 'KESTARI';
            break;
        case 'psdm':
            $('.krisar__dialog-title')[0].innerHTML = data.psdm.nama;
            $('.krisar__dialog-desc')[0].innerHTML = data.psdm.desc;
            $('.krisar__dialog-akronim')[0].innerHTML = data.psdm.akronim;
            $('#kritik-nama-bidang')[0].value = 'PSDM';
            break;
        case 'hublu':
            $('.krisar__dialog-title')[0].innerHTML = data.hublu.nama;
            $('.krisar__dialog-desc')[0].innerHTML = data.hublu.desc;
            $('.krisar__dialog-akronim')[0].innerHTML = data.hublu.akronim;
            $('#kritik-nama-bidang')[0].value = 'HUBLU';
            break;
        case 'sera':
            $('.krisar__dialog-title')[0].innerHTML = data.sera.nama;
            $('.krisar__dialog-desc')[0].innerHTML = data.sera.desc;
            $('.krisar__dialog-akronim')[0].innerHTML = data.sera.akronim;
            $('#kritik-nama-bidang')[0].value = 'SERA';
            break;
        case 'media':
            $('.krisar__dialog-title')[0].innerHTML = data.media.nama;
            $('.krisar__dialog-desc')[0].innerHTML = data.media.desc;
            $('.krisar__dialog-akronim')[0].innerHTML = data.media.akronim;
            $('#kritik-nama-bidang')[0].value = 'MEDIA';
            break;
        case 'akademik':
            $('.krisar__dialog-title')[0].innerHTML = data.akademik.nama;
            $('.krisar__dialog-desc')[0].innerHTML = data.akademik.desc;
            $('.krisar__dialog-akronim')[0].innerHTML = data.akademik.akronim;
            $('#kritik-nama-bidang')[0].value = 'AKADEMIK';
            break;
        case 'ristek':
            $('.krisar__dialog-title')[0].innerHTML = data.ristek.nama;
            $('.krisar__dialog-desc')[0].innerHTML = data.ristek.desc;
            $('.krisar__dialog-akronim')[0].innerHTML = data.ristek.akronim;
            $('#kritik-nama-bidang')[0].value = 'RISTEK';
            break;
        default:
            break;
    }
})