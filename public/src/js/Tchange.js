var data = [];
var metadata = [];
var table = null;
var hinne;
var too;
var nameList;


var glyphD = "glyphicon glyphicon-sort-by-attributes-alt";
var glyphU = "glyphicon glyphicon-arrow-up";
var clearButton = "<button class=\"clearB\" onclick=\"clearRows()\">X</button>"


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
    /*
     $("#table_wrapper").slideToggle("fast");
         $("#nameSel").slideToggle("fast");
    */
    //$("#list_im").addClass("glyphicon glyphicon-th-list");
    
     $("#names").click(function(){
         
        $("#table_wrapper").slideToggle("fast");
         $("#nameSel").slideToggle("fast");
         
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

function clearRows() {
    table 
    .rows( '.selected' )
    .nodes()
    .to$() 
    .removeClass( 'selected' );
    $("#names").click();
    checkClickedRows();
    

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
    var names = "<span class=\"" + curGlyph + "\"> Tööd hinnetega: ";
    nameList = [];
    for (i = 0; i < table.rows('.selected').data().length; i++) { 
        names += table.rows('.selected').data()[i][1] +": " + table.rows('.selected').data()[i][3] +"; "
        nameList[i] = [];
        nameList[i] = table.rows('.selected').data()[i][0];
        document.getElementById("hinne").value = table.rows('.selected').data()[i][5];
        document.getElementById("punkt").value = table.rows('.selected').data()[i][4];
        
    }
    if(nameList.length > 0) {
            names = names +" " + clearButton;
    }

    console.log(nameList);
    namesCell.innerHTML = names;
  
    
}

function removeRows() {
    table.rows( '.selected' )
    .remove()
    .draw();
    
    checkClickedRows();
}


$("#hinne").keyup(function() {
    $("#hinne").val(this.value.match(/[0-5]/));
});


$("#punkt").keyup(function() {
    $("#punkt").val(this.value.match(/[0-9]{0,3}/));
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
    var enteredpoints = document.getElementById("punkt").value;
    var enteredgrade = document.getElementById("hinne").value;
    var enteredcomm = document.getElementById("comments").value;
    
    if(enteredpoints == "") {
        console.log("Pole hinnet");
        document.getElementById("punkt").style.color = "red";
        errors = true;
    } 
    
    if(nameList.length == 0) {
        console.log("Pole nimesid");
        document.getElementById("names").style.color = "red";
        errors = true;
        
    } 
    
    if(errors == false) {
        document.getElementById("save_message").innerHTML="Saved: Nr." + nameList + "; Points: "+ enteredpoints +"; Grade: "  + enteredgrade + "; " + enteredcomm; 
        for(var i =0; i < nameList.length; i++){
            console.log("Posting")
            $.ajax({
                method: 'POST',
                url: urlChange,
                data: {upload: nameList[i], grade: enteredgrade,points: enteredpoints, comments: enteredcomm , _token: token}
            })
            .done(function (msg) {
                console.log(msg);
                
            });
        }
        removeRows();

    
    }
    
}



