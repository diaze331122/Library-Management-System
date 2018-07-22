var table;
var rows;

$('body').ready(function(){
 table = document.getElementById("table");
 rows =  table.getElementsByTagName("tr");
});

$('#sort_list').change(function(){
 var column;
 	if (this.value == "Date-newest" || this.value == "Date-oldest"){
           sortRows(3,this.value);
	}
	if (this.value == "Title[A-Z]" || this.value == "Title[Z-A]"){
           sortRows(0,this.value);
	}	
});

function sortRows(column,dir){
   for (var i=0;i<rows.length;i++){
      for (var j=0;j<rows.length;j++){
          r1 = rows[j].getElementsByTagName('td')[column];
          r2 = rows[j+1].getElementsByTagName('td')[column];
          direction(r1,r2,dir);
      }
   }
}

function direction(r1,r2,dir){
   if (dir == 'Date-oldest' || dir == 'Title[A-Z]'){
      if (greaterThan(r1,r2){
         switchRows(r2,r1);
      }
   }
   if (dir == 'Date-newest' || dir == 'Title[Z-A]'){
      if (lessThan(r1,r2)){
         switchRows(r2,r1);
      }
   }
}

function switchRows(newNode,referenceRow){
   (referenceRow.parentNode).insertBefore(newNode,referenceNode);
}

function greaterThan(r1,r2){
  if (r1.innerHTML.toLowerCase() < r2.innerHTML.toLowerCase()){
     return true;
  }
  return false;
}

function lessThan(r1,r2){
   if (r1.innerHTML.toLowerCase() > r2.innerHTML.toLowerCase()){
	return false;
   }else{
	return true;
   }
}
