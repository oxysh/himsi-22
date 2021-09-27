const list = document.querySelectorAll('.thumb-item');
const modalInfo = document.querySelector('.modal#info-bidang');
const btnkritik = document.querySelector('#button-kritik');
const modalForm = document.querySelector('.modal#kritik-saran');
const makestaf = (data) => {
  const a = document.createElement('div')
  a.classList.add('staf');
  const b = document.createElement('img')
  b.setAttribute('src', yerLink + data.img);
  const c = document.createElement('div');
  c.classList.add('staf-text');
  const e = document.createElement('span');
  e.classList.add('name');
  e.innerHTML = data.nama;
  const f = document.createElement('span');
  f.classList.add('title');
  f.innerHTML = data.jabatan;
  c.appendChild(e);
  c.appendChild(f);
  const g = document.createElement('div');
  g.classList.add('angk');
  g.innerHTML = data.angkatan;
  a.appendChild(b);
  a.appendChild(c);
  a.appendChild(g);
  return a
}
const show = (themodal, data) => {
  themodal.querySelector('#nama-bidang').innerHTML = data.nama;
  themodal.querySelector('#desc-bidang').innerHTML = data.desc;
  data.staff.forEach(stap => {
    themodal.querySelector('.modal-content').appendChild(makestaf(stap))
  })
}
let dataselected = {};
list.forEach(item => {
  item.addEventListener('click', () => {
    modalInfo.classList.add('active');
    modalInfo.querySelector('.modal-content').scrollTop = 0
    document.querySelector('body').style.overflow = 'hidden';
    document.querySelectorAll('.modal-content .staf').forEach(staff => {
      staff.remove();
    })
    switch (item.dataset.bidang) {
      case 'psdm':
        show(modalInfo, data.psdm)
        dataselected = data.psdm
        break;
      case 'ristek':
        show(modalInfo, data.ristek)
        dataselected = data.ristek
        break;
      case 'hublu':
        show(modalInfo, data.hublu)
        dataselected = data.hublu
        break;
      case 'sera':
        show(modalInfo, data.sera)
        dataselected = data.sera
        break;
      case 'akademik':
        show(modalInfo, data.akademik)
        dataselected = data.akademik
        break;
      case 'kestari':
        show(modalInfo, data.kestari)
        dataselected = data.kestari
        break;
      case 'bph':
        show(modalInfo, data.bph)
        dataselected = data.bph
        break;
      case 'media':
        show(modalInfo, data.media)
        dataselected = data.media
        break;
      default:
        break;
    }
  })
});

document.querySelectorAll('.close-overlay').forEach(overlay => {
  overlay.addEventListener('click', () => {
    overlay.parentElement.classList.remove('active')
    document.querySelector('body').style.overflowX = 'scroll';
  })
})
btnkritik.addEventListener('click', () => {
  setTimeout(() => {
    modalInfo.classList.remove('active');
    modalForm.classList.add('active');
    modalForm.querySelector('#kritik-bidang').innerHTML = dataselected.nama;
    modalForm.querySelector('#kritik-nama-bidang').value = dataselected.nama
  }, 500)
})