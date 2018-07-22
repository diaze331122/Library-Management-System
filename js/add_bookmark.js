function add(id){
      if (window.XMLHttpRequest) {
            xmlhttp = new XMLHttpRequest();
      }else{
            xmlhttp = new ActiveXObject("Microsoft.XMLHTTP");
      }
      xmlhttp.onreadystatechange = function() {
          if (this.readyState == 4 && this.status == 200) {
              document.getElementById("message").innerHTML = this.responseText;
          }
      xmlhttp.open("GET","../database/set_bookmark.php?i="+id,true);
      xmlhttp.send();
}
