$('.adm-krisar__krisar').each(x => {
    let text = $('.adm-krisar__krisar')[x].innerHTML;
    if (text.length > 100) {
        text = text.substring(0, 100) + ' ...';
    }
    $('.adm-krisar__krisar')[x].innerHTML = text;
})

$('.adm-dashboard__card--krisar').click(e => {
    $('#krisarDialog p')[0].innerHTML = e.currentTarget.dataset.long;
    $('#krisarDialog h5')[0].innerHTML = e.currentTarget.querySelector('h5').innerHTML;
    $('#krisarDialog .adm-krisar__bidang')[0].innerHTML = e.currentTarget.dataset.bidang;

    $('#krisarDialog')[0].classList.add('active');
    $('.dialog__bg')[0].classList.add('active');
})
