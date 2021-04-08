//  ########################################################################### 
//  Calls
function callRecords(){
    var callRecords = document.querySelector('#call-record-table')
    var callRecordBtn = document.querySelector('#call-record-btn')

    displayController(
        callRecords, 
        callRecordBtn, 
        "&#x2706 View Call Records",
        "&#x2706 Hide Call Records "
    )

}

function displayControllerForAddCall(){
    var addCallContainer = document.querySelector('#add-call')
    var addCallBtn = document.querySelector('#add-call-btn')

    displayController(
        addCallContainer, 
        addCallBtn, 
        "+ Add Call Log ",
        "- Remove Call Log"
    )
}


//  ########################################################################### 
//  Description and Solution Record
function displayPerviousRecords(){
    var recordContainer = document.querySelector('#pervious-history-container')
    var recordBtn = document.querySelector('#pervious-record-history-btn')

    displayController(
        recordContainer,
        recordBtn,
        "&#x276E View History",
        "&#x276E Hide History"
    )
}

//  ########################################################################### 
//  Specialist History
function displaySpecialistRecords(){
    var recordContainer = document.querySelector('#specialist-record-container')
    var recordBtn = document.querySelector('#specialist-record-btn')
    displayController(
        recordContainer,
        recordBtn,
        "View Specialist Record",
        "Hide Specialist Record"
    )
}

function displayController(container, btn, showMsg, hideMsg){
    if(container.classList.contains('container-hide')){
        container.classList.remove('container-hide')
        btn.innerHTML = hideMsg
    } else {
        container.classList.add('container-hide')
        btn.innerHTML = showMsg
    }
}

function displayModifySpecialistSection(){
    var recordContainer = document.querySelector('#edit-specialist-container')
    var recordBtn = document.querySelector('#edit-specialist-btn')

    var specialistInput = document.querySelector('#specialist-id-input')

    if(recordContainer.classList.contains('container-hide')){
        recordContainer.classList.remove('container-hide')
        recordBtn.innerHTML = "Reset"
        specialistInput.removeAttribute('readonly')

    } else {
        recordContainer.classList.add('container-hide')
        recordBtn.innerHTML = "Edit"
        // TODO: set specialistInput to current specialist ID since they have clicked on the reset btn
        specialistInput.readOnly = true
    }

}

function validateSpecialistChange(){
    // validate the specialist
    displayModifySpecialistSection()  // behaviour is similar to this function so replace it.
}

function displayRecommendedSpecialist (){
    console.log("show recommended specialist table just like the client register page")
}