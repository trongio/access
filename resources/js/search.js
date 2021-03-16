window.searchSystem = function() {
    // Declare variables
    var input, filter, table, tr, td, show, txtValue;
    input = document.getElementById("search-table");
    filter = input.value.toUpperCase();
    table = document.getElementById("table");
    tr = table.getElementsByTagName("tr");

    // Loop through all table rows, and hide those who don't match the search query
    for (var i = 1; i < tr.length; i++) {
        for(var j = 0; j < 3; j++){
            td = tr[i].getElementsByTagName("td")[j];
            if(td){
                txtValue = td.textContent || td.innerText;
                if (txtValue.toUpperCase().indexOf(filter) > -1) {
                    show = true;
                }
            }
        }
        if(show){
            tr[i].style.display = "";
            show = false;
        }
        else {
            tr[i].style.display = "none";
        }
    }
}
