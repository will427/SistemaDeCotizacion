document.addEventListener("DOMContentLoaded", () => {

const modal=document.querySelector('.modal');
const modalC=document.querySelector('.modalc');
const openModal=document.querySelector('.btn.btn-warning.btn-lg.px-60');
const closeModal=document.querySelector('.close');
const openModalCalculos=document.querySelector('.btn.btn-sm.bg-primary.rounded.c');
const closeModalCalculos=document.querySelector('.btn.btn-warning');
const openModalCalculos2=document.querySelector('.btn.btn-sm.bg-primary.rounded.c2');
const closeModalCalculos2=document.querySelector('.btn.btn-primary');
const openModalCalculos3=document.querySelector('.btn.btn-sm.bg-primary.rounded.c3');
const closeModalCalculos3=document.querySelector('.btn.btn-success');


openModal.addEventListener('click',()=>{
   modal.classList.add('modal-show');
});

closeModal.addEventListener('click',(e)=>{
    e.preventDefault();
    modal.classList.remove('modal-show');
});

openModalCalculos.addEventListener('click',()=>{
    modalC.classList.add('modal-show');
});

closeModalCalculos.addEventListener('click',(e)=>{
    e.preventDefault();
    modalC.classList.remove('modal-show');
});

openModalCalculos2.addEventListener('click',()=>{
    modalC.classList.add('modal-show');
}
);

closeModalCalculos2.addEventListener('click',(e)=>{
    e.preventDefault();
    modalC.classList.remove('modal-show');
});

openModalCalculos3.addEventListener('click',()=>{
    modalC.classList.add('modal-show');
});

closeModalCalculos3.addEventListener('click',(e)=>{
    e.preventDefault();
    modalC.classList.remove('modal-show');
});

   
});