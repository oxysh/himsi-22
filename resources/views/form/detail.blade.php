<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Detail</title>
</head>

<body style="padding-left: 50px">
    <header>
        <h1>Detail Form</h1>
    </header>

    <section>
        <h3>Identitas Form</h3>
        <div style="margin-bottom: 10px">
            judul : {{ $form->judul }} <br>
            pemilik : {{ $form->pemilik }} <br>
            deadline : {{ $form->deadline }} <br>
        </div>
    </section>

    <section>
        <h3>Pertanyaan</h3>
        @if (sizeof($pertanyaan) == 0)
            Anda masih belum memiliki pertanyaan
        @endif
        @foreach ($pertanyaan as $p)
            <div style="margin-bottom: 10px">

                Tipe : {{ $p->tipe }} <br>
                Pertanyaan : {{ $p->pertanyaan }} <br>
                Opsi : {{ $p->opsi }} <br>
                <a href="{{ route('pertanyaan.destroy', $p->id) }}">Hapus Pertanyaan</a>
            </div>
        @endforeach
    </section>

    {{-- TODO :: tambahkan form buat pertanyaan --}}
    <section>
        <h3>Tambahkan Pertanyaan</h3>
        <form action="{{ route('pertanyaan.store') }}" method="post">
            @csrf
            <input type="hidden" name="formid" value="{{ $form->id }}">
            <label for="tipe">Tipe Pertanyaan</label>
            <select name="tipe" id="tipe">
                <option value="text">text</option>
                <option value="select">opsi</option>
                <option value="date">tanggal</option>
                <option value="datetime-local">tanggal dan waktu</option>
                <option value="time">waktu</option>
                <option value="number">angka</option>
            </select>

            <br>
            <label for="pertanyaan">Pertanyaan</label>
            <input required type="text" name="pertanyaan" id="pertanyaan">

            <br>
            <p>
                jika memilih tipe pertanyaan <strong>opsi</strong>
                <br> maka tulis opsi dari pertanyaan pada kolom ini
                <br> opsi pisahkan dengan tanda koma (,)
                <br> tidak perlu menggunakan spasi setelah tanda koma
                <br>
                <textarea name="opsi" id="opsi" cols="30" rows="10"></textarea>
            </p>
            <button type="submit">Submit</button>
        </form>
    </section>
</body>

</html>
