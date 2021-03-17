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
const displayFilterSection = () =>{
    const btnFilter = document.querySelector('#filter-btn-section')
    const btnFilterTxt = document.querySelector('#filter-btn-section p')
    const filterOptions = document.querySelector('#display-filter-container')
    btnFilter.addEventListener('click', ()=>{
        btnFilterTxt.classList.toggle('filter-btn-active')
        filterOptions.classList.toggle('show-filter-options')
        
    })
}

displayFilterSection()
navigationTabletMode()