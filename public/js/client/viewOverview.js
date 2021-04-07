//  ########################################################################### 
//  Call Records
function callRecords(){
    var callRecords = document.querySelector('#call-record-table')
    var callRecordBtn = document.querySelector('#call-record-btn')

    if( callRecords.classList.contains('container-hide') ){
        callRecordBtn.innerHTML = "&#x2706 Hide Call Records "
        callRecords.classList.remove('container-hide')
    } else {
        callRecords.classList.add('container-hide')
        callRecordBtn.innerHTML = "&#x2706 View Call Records"
    }

}


//  ########################################################################### 
//  Description and Solution Record
function displayPerviousRecords(){
    var recordContainer = document.querySelector('#pervious-history-container')
    var recordBtn = document.querySelector('#pervious-record-history-btn')
    
    if(recordContainer.classList.contains('container-hide')){
        recordContainer.classList.remove('container-hide')
        recordBtn.innerHTML = "&#x276E Hide History"
    } else {
        recordContainer.classList.add('container-hide')
        recordBtn.innerHTML = "&#x276E View History"
    }

}

//  ########################################################################### 
//  Specialist History
function displaySpecialistRecords(){
    var recordContainer = document.querySelector('#specialist-record-container')
    var recordBtn = document.querySelector('#specialist-record-btn')
    
    if(recordContainer.classList.contains('container-hide')){
        recordContainer.classList.remove('container-hide')
        recordBtn.innerHTML = "Hide Pervious Specialist"
    } else {
        recordContainer.classList.add('container-hide')
        recordBtn.innerHTML = "View Pervious Specialist"
    }

}