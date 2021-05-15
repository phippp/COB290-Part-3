var specRows = document.getElementById("spec-table").rows;
var specMap = {'id': 0, 'name': 1, 'branch': 3, 'location': 4};

function updateSpecialist(){

    var search = document.getElementById("search-input").value;
    var field = specMap[document.getElementById("search-type").value];

    for(var i = 1; i < specRows.length; i++){

        var data = specRows[i].cells[field].innerHTML;

        if((data.toLowerCase().includes(search.toLowerCase()) && search.length > 0) || search.length == 0 ){

            specRows[i].style.display = "table-row";

        } else {

            specRows[i].style.display = "none";

        }

    }

}
