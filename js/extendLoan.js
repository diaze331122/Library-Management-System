var response = '';

function extendLoan(id){
        var xmlhttp = new XMLHttpRequest();
        xmlhttp.onreadystatechange = function() {
            if (this.readyState == 4 && this.status == 200) {
                response = this.responseText;
            }
        };
        xmlhttp.open("GET","../database/extend_due_date.php?i="+id,true);
        xmlhttp.send();
}
