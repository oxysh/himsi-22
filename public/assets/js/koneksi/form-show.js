$('.form-show__option-btn--copy-shortlink').click(() => {
    navigator.clipboard.writeText($('.form-show__value--shortlink')[0].innerText)
    // kasi alert kalo berhasil di copy
    $('.form-show__alert-copied')[0].classList.remove('hidden');
    $('.form-show__alert-copied')[0].classList.remove('not-out');
})

$('.form-show__btn').click(e => {
    for ($i = 0; $i < $('.form-show__btn').length; $i++) {
        if ($('.form-show__btn')[$i].classList[1] == 'btn-primary') {
            $('.form-show__btn')[$i].classList.remove('btn-primary')
        }
        if ($('.form-show__content-body')[$i].classList[2] == 'active') {
            $('.form-show__content-body')[$i].classList.remove('active')
        }
    }

    e.target.classList.add('btn-primary')

    $('.form-show__content-body--' + e.target.getAttribute('data-name'))[0].classList.add('active')
})

// live preview
$('.form-previewed').each(x => {
    let preview = $('.form-previewed')[x].dataset.preview;
    $(preview)[0].textContent = $('.form-previewed')[x].value;
    if (preview == "#form-preview-title") {
        $('#form-preview-title-afterform')[0].textContent = $('.form-previewed')[x].value;
    }

    $('.form-previewed')[x].addEventListener('input', () => {
        $(preview)[0].textContent = $('.form-previewed')[x].value;
        // if ($('.form-previewed')[x].value == "") {
        //     $(preview)[0].textContent = "Lorem ipsum";
        // }
        if ($(preview)[0] == "#form-preview-title") {
            $('#form-preview-title-afterform')[0].textContent = $('.form-previewed')[x].value;
        }
    })
});

// cek bitly
function cekregex(string) {
    var a = /[a-z]/i
    var b = /[0-9]/
    var result = []
    str = string.split('');
    str.forEach(char => {
        if (a.exec(char) || b.exec(char)) {
            result.push(char)
        }
    });

    return result.join('');
}

document.querySelector('#shortlink').addEventListener('input', (e) => {
    var shortlinkval = e.target.value
    $('#valid-shortlink')[0].value = cekregex(shortlinkval);
    if (cekregex(shortlinkval) == "") {
        $('#error-shortlink')[0].classList.remove('hidden');
        $('#error-shortlink')[0].classList.add('red-important');
        $('#error-shortlink')[0].innerHTML = "hanya boleh mengandung huruf dan angka";
    } else {
        $('#error-shortlink')[0].classList.remove('hidden');
        $('#error-shortlink')[0].classList.remove('red-important');
        $('#error-shortlink')[0].innerHTML = "himsiunair.com/f/" + cekregex(shortlinkval);
    }
})

// Cek input yang 'harus diisi'
$('.form__harus-diisi').on('input', e => {
    if (e.target.value == '') {
        $(e.target.dataset.error)[0].classList.remove('hidden')
        $(e.target.dataset.error)[0].classList.add('red-important');
    } else {
        $(e.target.dataset.error)[0].classList.add('hidden')
        $(e.target.dataset.error)[0].classList.remove('red-important');
    }
})

// live preview add pertanyaan form
$('#tambah-pertanyaan-title')[0].addEventListener('input', () => {
    if ($('#tambah-pertanyaan-title')[0].value != "") {
        $('#tambah-pertanyaan-preview-title')[0].textContent = $('#tambah-pertanyaan-title')[0].value;
        $('#tambah-pertanyaan-preview input')[0].setAttribute('placeholder', $(
            '#tambah-pertanyaan-title')[0].value);
        $('#tambah-pertanyaan-preview textarea')[0].setAttribute('placeholder', $(
            '#tambah-pertanyaan-title')[0].value);
    } else {
        $('#tambah-pertanyaan-preview-title')[0].textContent = "Judul Pertanyaan";
        $('#tambah-pertanyaan-preview input')[0].setAttribute('placeholder', "Judul Pertanyaan");
        $('#tambah-pertanyaan-preview textarea')[0].setAttribute('placeholder', "Judul Pertanyaan");
    }
})

$('#tambah-pertanyaan-jenis')[0].addEventListener('input', () => {
    $('#tambah-pertanyaan-preview .form__control').each(x => {
        $('#tambah-pertanyaan-preview .form__control')[x].classList.add('hidden');
    })

    if ($('#tambah-pertanyaan-jenis')[0].value == "textarea") {
        console.log($('#tambah-pertanyaan-opsi-group')[0]);
        $('#tambah-pertanyaan-opsi-group')[0].classList.add('hidden');
        $('#tambah-pertanyaan-preview textarea')[0].classList.remove('hidden');
    } else if ($('#tambah-pertanyaan-jenis')[0].value == "select") {
        $('#tambah-pertanyaan-preview select')[0].classList.remove('hidden');
        $('#tambah-pertanyaan-opsi-group')[0].classList.remove('hidden');
    } else {
        $('#tambah-pertanyaan-opsi-group')[0].classList.add('hidden');
        $('#tambah-pertanyaan-preview input')[0].classList.remove('hidden');
        $('#tambah-pertanyaan-preview input')[0].setAttribute('type', $('#tambah-pertanyaan-jenis')[0]
            .value);
        $('#tambah-pertanyaan-preview input')[0].removeAttribute('disabled');
    }
})

// edit pertanyaan.
$('.form-show__edit-pertanyaan').click(e => {
    $('#tambah-pertanyaan-title')[0].value = e.target.dataset.quest;
    $('#tambah-pertanyaan-jenis option').each(x => {
        if ($('#tambah-pertanyaan-jenis option')[x].value == e.target.dataset.tipe) {
            $('#tambah-pertanyaan-jenis option')[x].setAttribute('selected', 'true');
            $('#tambah-pertanyaan-jenis option')[x].click();
        }
    })
    $('#tambah-pertanyaan-wajib option').each(x => {
        console.log(e.target.dataset.wajib == "1");
        console.log($('#tambah-pertanyaan-wajib option')[x].value == "ya");
        let jenisPertanyaan = $('#tambah-pertanyaan-wajib option')[x];
        if ($('#tambah-pertanyaan-wajib option')[x].value == "Iya" && e.target.dataset.wajib ==
            "1") {
            $('#tambah-pertanyaan-wajib option')[x].setAttribute('selected', 'true');
        } else if ($('#tambah-pertanyaan-wajib option')[x].value == "Tidak" && e.target.dataset
            .wajib == "0") {
            $('#tambah-pertanyaan-wajib option')[x].setAttribute('selected', 'true');
        }
    })
    $('#tambah-pertanyaan-opsi')[0].value = e.target.dataset.opsi;
    $('#tambah-pertanyaan-unique')[0].value = e.target.dataset.unique;
    $('#addPertanyaanDialog form')[0].setAttribute('action', e.target.dataset.link);

    // live preview
    if ($('#tambah-pertanyaan-title')[0].value != "") {
        $('#tambah-pertanyaan-preview-title')[0].textContent = $('#tambah-pertanyaan-title')[0].value;
        $('#tambah-pertanyaan-preview input')[0].setAttribute('placeholder', $(
            '#tambah-pertanyaan-title')[0].value);
        $('#tambah-pertanyaan-preview textarea')[0].setAttribute('placeholder', $(
            '#tambah-pertanyaan-title')[0].value);
    } else {
        $('#tambah-pertanyaan-preview-title')[0].textContent = "Judul Pertanyaan";
        $('#tambah-pertanyaan-preview input')[0].setAttribute('placeholder', "Judul Pertanyaan");
        $('#tambah-pertanyaan-preview textarea')[0].setAttribute('placeholder', "Judul Pertanyaan");
    }
    $('#tambah-pertanyaan-preview .form__control').each(x => {
        $('#tambah-pertanyaan-preview .form__control')[x].classList.add('hidden');
    })
    if ($('#tambah-pertanyaan-jenis')[0].value == "textarea") {
        console.log($('#tambah-pertanyaan-opsi-group')[0]);
        $('#tambah-pertanyaan-opsi-group')[0].classList.add('hidden');
        $('#tambah-pertanyaan-preview textarea')[0].classList.remove('hidden');
    } else if ($('#tambah-pertanyaan-jenis')[0].value == "select") {
        $('#tambah-pertanyaan-preview select')[0].classList.remove('hidden');
        $('#tambah-pertanyaan-opsi-group')[0].classList.remove('hidden');
    } else {
        $('#tambah-pertanyaan-opsi-group')[0].classList.add('hidden');
        $('#tambah-pertanyaan-preview input')[0].classList.remove('hidden');
        $('#tambah-pertanyaan-preview input')[0].setAttribute('type', $('#tambah-pertanyaan-jenis')[0]
            .value);
        $('#tambah-pertanyaan-preview input')[0].removeAttribute('disabled');
    }

    // buka dialognya
    $('#addPertanyaanDialog')[0].classList.add('active')
    $('.dialog__bg')[0].classList.add('active');
})

// delete pertanyaan.
$('.form-show__delete-pertanyaan').click(e => {
    $('#deletePertanyaanDialog>p>span')[0].innerHTML = e.target.dataset.quest;

    // buka dialognya
    $('#deletePertanyaanDialog')[0].classList.add('active')
    $('.dialog__bg')[0].classList.add('active');
});

// dialog
$('#formEdit').click(() => {
    $('#editDialog')[0].classList.add('active')
    $('.dialog__bg')[0].classList.add('active');
})

$('.form-show__option-btn--edit-shortlink').click(() => {
    $('.form-show__edit-shortlink-dialog')[0].classList.add('active')
    $('.dialog__bg')[0].classList.add('active');
})

$('#formDelete').click(() => {
    $('#deleteFormDialog')[0].classList.add('active')
    $('.dialog__bg')[0].classList.add('active');
})

$('#addPertanyaan').click(() => {
    $('#addPertanyaanDialog')[0].classList.add('active')
    $('.dialog__bg')[0].classList.add('active');
})

$('#sortPertanyaan').click(() => {
    $('#sortPertanyaanDialog')[0].classList.add('active')
    $('.dialog__bg')[0].classList.add('active');
})