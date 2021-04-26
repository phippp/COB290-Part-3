var hardwareRows = document.getElementById("hardware-table").rows;
var hardwareMap = {'serial_num': 2, 'make': 4, 'type': 3, 'name': 1};

var softwareRows = document.getElementById("software-table").rows;

function updateHardware(){

    var search = document.getElementsByName("hardware-input")[0].value;
    var field = hardwareMap[document.getElementsByName("hardware-type")[0].value];

    for(var i = 1; i < hardwareRows.length; i++){

        var data = hardwareRows[i].cells[field].innerHTML;

        if((data.toLowerCase().includes(search.toLowerCase()) && search.length > 0) || search.length == 0 ){

            hardwareRows[i].style.display = "table-row";

        } else {

            hardwareRows[i].style.display = "none";

        }

    }

}

function updateSoftware(){

    var search = document.getElementsByName("software-input")[0].value;

    for(var i = 1; i < softwareRows.length; i++){

        var data = softwareRows[i].cells[1].innerHTML;

        if((data.toLowerCase().includes(search.toLowerCase()) && search.length > 0) || search.length == 0 ){

            softwareRows[i].style.display = "table-row";

        } else {

            softwareRows[i].style.display = "none";

        }

    }

}
