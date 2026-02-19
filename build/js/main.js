document.addEventListener('DOMContentLoaded',()=>{
    phoneNav();
    fixedNav();
    searchButton();
});

function phoneNav(){
    const nav = document.querySelector('.menu');
    const layout = document.querySelector('.menu-layout');
    const btn = document.querySelector('.burguer-button');

    btn.addEventListener('click',(e)=>{
        e.preventDefault()
        layout.classList.toggle('visible')
    })
}

function fixedNav(){
    const nav = document.querySelector('.navbar');
    const main = document.querySelector('main');
    const body = document.querySelector('body')
    window.addEventListener('scroll',()=>{
        if(main.getBoundingClientRect().top < 0){
            nav.classList.add('fixed');
            body.classList.add('body-scroll')
        }else{
            nav.classList.remove('fixed');
            body.classList.remove('body-scroll')

        }
    });
    
}

