// Chuyển slider ảnh 
const $ = document.querySelector.bind(document)
const $$ = document.querySelectorAll.bind(document)

const slides =$$('.slide-move__item')
const slideUp = $('.slide-up')
const slideBack = $('.slide-back')
const widthSlide = $('.slide').clientWidth;
const slideMove =  $('.slide-move')
const maxSlide = widthSlide*2

var up = 0


function Up (){
    if(up < maxSlide){
        up += widthSlide
    }
    else{
        up=0
    }
    // slideMove.style.transform =`translate3d(-${up}px, 0px, 0px)`

    slides.forEach((tab,index) => {
        if(up === widthSlide){
            $('.slide-move__item.active').classList.remove('active')
            slides[1].classList.add('active')
        }if(up===maxSlide){
            $('.slide-move__item.active').classList.remove('active')
            slides[2].classList.add('active')

        }if(up===0){
            $('.slide-move__item.active').classList.remove('active')
            slides[0].classList.add('active')
        }
    })

    $('.slide-move__item.active').style.animation = `Slider linear 0.2s`
    
}

function Back (){
    if(up > 0){
        up -= widthSlide

    }
    else{
        up = maxSlide
    }
    // slideMove.style.transform = `translate3d(-${up}px, 0px, 0px)`
    slides.forEach((tab,index) => {
        if(up === widthSlide){
            $('.slide-move__item.active').classList.remove('active')
            slides[1].classList.add('active')
        }if(up===maxSlide){
            $('.slide-move__item.active').classList.remove('active')
            slides[2].classList.add('active')

        }if(up===0){
            $('.slide-move__item.active').classList.remove('active')
            slides[0].classList.add('active')
        }
    })
    $('.slide-move__item.active').style.animation = `SliderTT linear 0.2s`
    
    
}

// Sau 5s chuyển slide
let setTime;
const startInterval = () => {
    
    setTime = setInterval(function(){
        Up ()
    },5000)
}

startInterval();

slideUp.onclick = function(){
    Up ()
    clearInterval(setTime)
    setTimeout(startInterval(), 5000)
}

slideBack.onclick = function(){
    Back ()
    clearInterval(setTime)
    setTimeout(startInterval(), 5000)
}

// show nav mobile and table

const btnMenu = $('.header-menu-mobile-icon')
const overlay = $('.nav-mobile-overlay')
const navMobile = $('.nav-mobile')
const navClose = $('.nav-close')
const showSubNavMobile = $('.nav-mobile__child')
const navItem = $$('.nav-mobile-item__link')
// hiện ô tìm kiếm trên mobile and table
const activeBoxSearch = $('.header-menu-mobile-search')
const boxSearch = $('.box-search')
const app = $('.app__container')




const handleBtnMenu = () => {
    btnMenu.onclick = () => {
        overlay.classList.add('active-sub-mobile')
        navMobile.classList.add('active-sub-mobile')
     
    }

    overlay.onclick = () => {
        overlay.classList.remove('active-sub-mobile')
        navMobile.classList.remove('active-sub-mobile')
    }

    navClose.onclick = () => {
        overlay.classList.remove('active-sub-mobile')
        navMobile.classList.remove('active-sub-mobile')
    }

    navItem.forEach( (value,index) => {
        value.onclick = (e) => {
            showSubNavMobile.classList.toggle('active-sub-mobile')
            e.target.classList.toggle('deg')
        }
    })


    // show box search
    
    app.onclick = () =>{
        boxSearch.classList.remove('active')
    }

    activeBoxSearch.onclick = (e) => {
        boxSearch.classList.toggle('active')
        
    }

    boxSearch.onclick = (e) => {
        e.stopPropagation()
    }
}

handleBtnMenu();







