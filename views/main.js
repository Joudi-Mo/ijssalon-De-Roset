const bars = document.querySelector('.checkbtn');
const ul_list = document.querySelector('.list');

bars.addEventListener('click', function(){
    this.classList.toggle('is-active');
    ul_list.classList.toggle('toggle');
})