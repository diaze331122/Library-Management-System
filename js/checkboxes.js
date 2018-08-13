var checkAll = document.getElementById("check_all_header");
checkAll.addEventListener("change",check_all);

function check_all(){
 var checkboxes = document.getElementsByTagName("input");
 var isChecked = false;
 
 if (checkAll.checked){
    isChecked = true;
 }else{
    isChecked = false;
 }
 for (var i=0;i<checkboxes.length;i++){
   if (checkboxes[i].type == "checkbox"){
      checkboxes[i].checked = isChecked;
   }
 }

}