var data = [];
var metadata = [];
var table = null;
var hinne;
var too;
var nameList;

var glyphD = "glyphicon glyphicon-sort-by-attributes-alt";
var glyphU = "glyphicon glyphicon-arrow-up";

var curGlyph = glyphD;
var listDown = false;

window.onload = function() {
    
    
 
    $('#table tbody').on( 'click', 'tr', function () {
        $(this).toggleClass('selected');
    } );
 
    $('#table').click( function () {
        checkClickedRows();
    } );
    
    var tablez = document.getElementById("table");
   
    
    checkClickedRows();
    
    
    
	//expand list
    $("#names").click(function(){

       $("#table_wrapper").slideToggle("fast");
        $("#nameSel").slideToggle("fast");
               //change icon
               
               if(listDown == false) {
                       listDown = true;
                       curGlyph = glyphU;
               } else {
                       listDown = false;
                       curGlyph = glyphD;

               }
               checkClickedRows();
    });


    
}

function checkClickedRows() {
    if(table == null) {
        table = $('#table').DataTable( {
        "bInfo": false
      });
    }
    /*console.log( table.rows('.selected').data().length +' row(s) selected' );
    console.log( table.rows('.selected').data());*/
    document.getElementById("names").style.color = "blue";
    var namesCell = document.getElementById("names");
    var names = "<span class=\"" + curGlyph + "\"> Tudeng(id): ";
    nameList = [];
    for (i = 0; i < table.rows('.selected').data().length; i++) { 
        names += table.rows('.selected').data()[i][0] +"; "
        nameList[i] = table.rows('.selected').data()[i][1];
    }
    console.log(nameList);
    namesCell.innerHTML = names;
  
    
}
    
$("#test").mSelectDBox({

   "list": testList,

  // enable multiple select
  "multiple": false,

  // enable autocomplete
  "autoComplete": true,
  // Name of instance. 
  "name": "a"

});
$("#hinne").keyup(function() {
    $("#hinne").val(this.value.match(/[0-5]/));
});

$("#hinne").mSelectDBox({
 "list": [0, 1, 2, 3, 4,5],

  // enable multiple select
  "multiple": false,

    "autoComplete": true,
  // Name of instance. 
  "name": "b"
  

});  



function save() {
    var errors = false;
    var enteredtest = (document.getElementById("test").value);
    var enteredgrade = document.getElementById("hinne").value;
    var enteredcomm = document.getElementById("comments").value;
    if(enteredtest == "") {
        console.log("Pole tööd");
        document.getElementById("test").style.color = "red";
        errors = true;
    } 
    
    if(enteredgrade == "") {
        console.log("Pole hinnet");
        document.getElementById("hinne").style.color = "red";
        errors = true;
    } 
    
    if(nameList.length == 0) {
        console.log("Pole nimesid");
        document.getElementById("names").style.color = "red";
        errors = true;
        
    } 
    
    if(errors == false) {
        document.getElementById("save_message").innerHTML="Saved: " + nameList +"; " + enteredtest+ "; " + enteredgrade + "; " + enteredcomm; 
        for(var i =0; i < nameList.length; i++){
            console.log("Posting")
            $.ajax({
                method: 'POST',
                url: urlEnter,
                data: {code: nameList[i], test: enteredtest, grade: enteredgrade, comments: enteredcomm , _token: token}
            })
            .done(function (msg) {
                console.log(msg);
                
            });
        }
    
    
    }
    
}

