$('.nav .dropdown').click(e => {
    e.currentTarget.classList.toggle('active')
    console.log(e.currentTarget)
})

$('body').click(e => {
    if(!e.target.classList.contains('dropdown')){
        $('.dropdown').map(ddown => {
            $('.dropdown')[ddown].classList.remove('active');
        });
    }
})

$(document).ready(function(){
    $(".nav__burger").click(e => {
        e.currentTarget.classList.toggle("active");
        e.currentTarget.parentNode.nextElementSibling.classList.toggle("active");
    });
});