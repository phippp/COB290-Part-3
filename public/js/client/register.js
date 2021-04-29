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

function displayAppropriateDevice(btnClicked){
    // Getting the 2 input 'button' so we can add css styling to show which is selected and which is not
    var btnSolution = document.querySelector('#toggle-hardware')
    var btnSpecialist = document.querySelector('#toggle-software')
    
    var softwareSection = document.querySelector('#software-section')
    var hardwareSection = document.querySelector('#hardware-section')
    if(btnClicked == "Hardware"){
        // If the 'Provide Solution' button is clicked, we only show the solution section
        btnSolution.classList.add('toggle-selected')
        btnSpecialist.classList.remove('toggle-selected')
        softwareSection.classList.add("container-hide")
        hardwareSection.classList.remove("container-hide")
    } else if (btnClicked == "Software"){
        // If the 'Assign Specialist' button is clicked, we will not show the problem ID section
        btnSolution.classList.remove('toggle-selected')
        btnSpecialist.classList.add('toggle-selected')
        softwareSection.classList.remove("container-hide")
        hardwareSection.classList.add("container-hide")
    }
}


// this function will reload the specific and general category when the user click on reset button
function reloadCategoryInfo(){
    // getting the inputs field so we can modify it so all the option are shown again
    var generalField = document.querySelector('#generic-category')
    var specificField = document.querySelector('#specific-category')
    
    // this variable will store what will be rendered on the browser
    generalHTML = '<option selected> - </option>' 
    specificHTML = '<option selected> - </option>' 

    for(category in genericCategory){
        categoryName = genericCategory[category]
        generalHTML += '<option value="' + categoryName + '">' + categoryName  + '</option>'
    }

    for(category in specificCategory){
        categoryName = specificCategory[category]
        specificHTML +='<option value="' + categoryName + '">' + categoryName  + '</option>'
    }

    generalField.innerHTML = generalHTML
    specificField.innerHTML = specificHTML 
}

// #######################################################################
// Category Section


function getSpecificCategoryBasedOnGeneric(){
    // this function will output only the specific category relevant to the generic category selected for better user experience

    var genericField = document.querySelector('#generic-category')
    var specificField = document.querySelector('#specific-category')

    // if the user chooses default option '-', then we show all the specific category (since this is the default behaviour of the system)
    if (genericField.value === '-'){
        reloadCategoryInfo()
        return false;
    }

    // since the user has selected generic category name, we need to show only those specific category that relates to generic
    var specificList = organizedCategory[genericField.value]
    
    // this checks if the generic input selected exist in our organizedCategory. (precaution measure if user modifies data from inspect element)
    if (specificList == undefined){
        return false;
    }

    // now that the generic field exist, we need to generate html code to output the specific category
    specificHTML = '<option selected> - </option>'
    for(category in specificList){
        categoryName = specificList[category]
        specificHTML += '<option value="' + categoryName  +  'selected>' +   categoryName  +'</option>'
    }

    // rendering the new specific list which is based on the generic list selected by the user
    specificField.innerHTML = specificHTML;
}

function getGenericCategoryBasedOnSpecific(){
    var genericField = document.querySelector('#generic-category')
    var specificField = document.querySelector('#specific-category')

    // getting the specific category selected by the user
    var specificSelected = specificField.value; 

    // this will store the generic category that we will retrieve based on the specific category
    var genericSelected = '';


    // finding general category
    loop:for(let genericName in organizedCategory){

        var genericCategory = organizedCategory[genericName]


        for(let specificIndex in genericCategory){
            var specificCategory = genericCategory[specificIndex]
            if (specificCategory == specificSelected){
                genericSelected = genericName 
                break loop;
            }
        }
    }

    allGenericOptions = genericField.options 
    for(i=0; i<allGenericOptions.length; i++){
        if(allGenericOptions[i].value == genericSelected){
            allGenericOptions[i].selected = 'selected' 
        }
    }


}