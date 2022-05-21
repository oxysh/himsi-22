document.querySelector('#btnShortLink').addEventListener('click', () => {
    window.open(document.querySelector('#inputShortLink').dataset.link + '/' + document.querySelector('#inputShortLink').value);
})

$('#buatForm').click(() => {
    $('#mengisiEmail')[0].classList.add('active')
})

$('#editForm').click(() => {
    $('#masukkanToken')[0].classList.add('active')
})