function displayAppropriateInputField(btnClicked){
    // Getting the 2 input 'button' so we can add css styling to show which is selected and which is not
    var btnSolution = document.querySelector('#toggle-provide-solution')
    var btnSpecialist = document.querySelector('#toggle-assign-specialist')

    // Getting the container so we can display or hide one of them based on the btn clicked
    var solutionSection = document.querySelector('#recommended-solution-section')
    var specialistSection = document.querySelector('#assign-specialist-section')

    // this is useful in the backend to track what option they have chosen and based on that we only have to check certain value
    const optionTracker = document.querySelector('#option-selected') 
    
    if(btnClicked == "Solution"){
        // If the 'Provide Solution' button is clicked, we only show the solution section
        solutionSection.classList.remove('container-hide')
        btnSolution.classList.add('toggle-selected')
        specialistSection.classList.add('container-hide')
        btnSpecialist.classList.remove('toggle-selected')
        optionTracker.value = "Solution"
    } else if (btnClicked == "Specialist"){
        // If the 'Assign Specialist' button is clicked, we will not show the problem ID section
        solutionSection.classList.add('container-hide')
        btnSolution.classList.remove('toggle-selected')
        specialistSection.classList.remove('container-hide')
        btnSpecialist.classList.add('toggle-selected')
        optionTracker.value = "Specialist"
    }
}

