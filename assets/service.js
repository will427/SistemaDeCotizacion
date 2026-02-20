document.addEventListener("DOMContentLoaded", () => {

const modal=document.querySelector('.modal');
const openModal=document.querySelector('.btn.btn-warning.btn-lg.px-60');
const closeModal=document.querySelector('.close');
const openModal2=document.querySelector('.btn.btn-sm.bg-success.rounded.text-center.py-2.px-2.d-none');


openModal.addEventListener('click',()=>{
   modal.classList.add('modal-show');
});

closeModal.addEventListener('click',(e)=>{
    e.preventDefault();
    modal.classList.remove('modal-show');
});

openModal2.addEventListener('click',()=>{
    modal.classList.add('modal-show');

});

})
