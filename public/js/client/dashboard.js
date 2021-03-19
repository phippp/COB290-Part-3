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