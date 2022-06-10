$(".form-responden__form button[type='submit']").click(e => {
    $('.form-responden__form .required').each(x => {
        if ($('.form-responden__form .required')[x].value == '') {
            e.preventDefault();
            $('.form-responden__form .required')[x].previousElementSibling.children[1].classList
                .remove('hidden');
            window.scrollTo(0, 0);
        } else {
            $('.form-responden__form .required')[x].previousElementSibling.children[1].classList
                .add('hidden');
        }
    })
})