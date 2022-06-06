$('.alert__close').click(e => {
    e.target.parentElement.style.visibility = 'hidden';
    e.target.parentElement.style.transform = 'translate(calc(-50% - 1rem), -50%)';
    e.target.parentElement.style.opacity = 0;
})