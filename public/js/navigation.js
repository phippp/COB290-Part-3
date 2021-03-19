const navigationTabletMode = () => {
    const burgerMenuViewIcon = document.querySelector('#open-nav');
    const burgerMenuCloseIcon = document.querySelector('#close-nav');
    burgerMenuViewIcon.addEventListener('click', ()=>{
        document.querySelector('#primary-nav-links').style.display = 'flex';
        document.querySelector('#secondary-nav-links').style.display = 'flex';
        burgerMenuCloseIcon.classList.remove('container-hide')
        burgerMenuViewIcon.classList.add('container-hide')
    });

    burgerMenuCloseIcon.addEventListener('click', ()=>{
        document.querySelector('#primary-nav-links').style.display = 'none';
        document.querySelector('#secondary-nav-links').style.display = 'none';
        burgerMenuCloseIcon.classList.add('container-hide')
        burgerMenuViewIcon.classList.remove('container-hide')
    });
}

navigationTabletMode()