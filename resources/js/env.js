let formValue = [];
$('form').find('.form__control').each(x => {
    formValue.push($('form').find('.form__control')[x].value);
})

$('.btn-close').click(e => {
    e.preventDefault();
    e.target.closest('.dialog').classList.remove('active');
    $('.dialog__bg')[0].classList.remove('active');

    $('form').find('.form__control').each(x => {
        $('form').find('.form__control')[x].value = formValue[x];
    })
})