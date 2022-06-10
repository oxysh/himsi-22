// activate sidebar menu
if (location.pathname == '/admin') {
    $('.sidebar__menu').each(x => {
        $('.sidebar__menu')[x].classList.remove('active')
    })
    $('.sidebar__menu--dashboard')[0].classList.add('active')
} else if (location.pathname.includes("/chsi/admin/curhat")) {
    $('.sidebar__menu').each(x => {
        $('.sidebar__menu')[x].classList.remove('active')
    })
    $('.sidebar__menu--curhat')[0].classList.add('active')
} else if (location.pathname.includes('/form')) {
    $('.sidebar__menu').each(x => {
        $('.sidebar__menu')[x].classList.remove('active')
    })
    $('.sidebar__menu--form')[0].classList.add('active')
} else if (location.pathname.includes('/chsi/admin/kritik')) {
    $('.sidebar__menu').each(x => {
        $('.sidebar__menu')[x].classList.remove('active')
    })
    $('.sidebar__menu--krisar')[0].classList.add('active')
}

// change image on active sidebar menu
$('.sidebar__menu').each(x => {
    if ($('.sidebar__menu')[x].classList.contains('active')) {
        $('.sidebar__icon .idle')[x].classList.add('hidden');
        $('.sidebar__icon .active')[x].classList.remove('hidden');
    } else {
        $('.sidebar__icon .idle')[x].classList.remove('hidden');
        $('.sidebar__icon .active')[x].classList.add('hidden');
    }
})

// toggler sidebar
$('.sidebar__toggle').click(() => {
    // console.log($('.sidebar__container')[0]);
    $('.sidebar')[0].classList.toggle('sidebar__expander')
})
