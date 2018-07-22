var table = document.getElementById('table'); //table
var rows = table.getElementsByTagName('tr');
var authorArray = [];
var subjectArray = [];

for(var i=1;i<rows.length;i++){
   var authorText = rows[i].getElementsByTagName('td')[1].innerHTML;
   var subjectText = rows[i].getElementsByTagName('td')[2].innerHTML;
   var a1 = authorText.split(', ');
   var a2 = subjectText.split(', ');
   addToArrays(a1,a2);
}

removeDuplicates();
fillLists();

function addToArrays(a1,a2){
   authorArray = authorArray.concat(a1);
   subjectArray = subjectArray.concat(a2);
}

function removeDuplicates(){
   authorArray = [...new Set(authorArray)];
   subjectArray = [...new Set(subjectArray)];
}

function fillLists(){
   var authorList = document.getElementById('author');
   var subjectList = document.getElementById('subject');

   for (var i=0;i<authorArray.length;i++){
      var option = document.createElement('option');
      option.text = authorArray[i];
      option.value = authorArray[i];
      authorList.appendChild(option);
   }

   for (var i=0;i<subjectArray.length;i++){
      var option = document.createElement('option');
      option.text = subjectArray[i];
      option.value = subjectArray[i];
      subjectList.appendChild(option); 
   }
}
