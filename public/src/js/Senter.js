var output;

var data = [];
var metadata = [];
var table = null;

var glyphD = "glyphicon glyphicon-user";
var glyphU = "glyphicon glyphicon-arrow-up";

var curGlyph = glyphD;
var listDown = false;

function handleFileSelect(evt) {
    var files = evt.target.files; // FileList object

    // files is a FileList of File objects. List some properties.
    output = [];
    for (var i = 0, f; f = files[i]; i++) {
      output.push('<li><strong>', escape(f.name), '</strong> (', f.type || 'n/a', ') - ',
                  f.size, ' bytes, last modified: ',
                  f.lastModifiedDate ? f.lastModifiedDate.toLocaleDateString() : 'n/a',
                  '</li>');
    }
    document.getElementById('list').innerHTML = '<ul>' + output.join('') + '</ul>';
  }

  document.getElementById('files').addEventListener('change', handleFileSelect, false);


function getQueryVariable(variable) {
    var query = window.location.search.substring(1);
    var vars = query.split('&');
    for (var i = 0; i < vars.length; i++) {
        var pair = vars[i].split('=');
        if (decodeURIComponent(pair[0]) == variable) {
            return decodeURIComponent(pair[1]);
        }
    }
    console.log('Query variable %s not found', variable);
}

//document.getElementById('tooNimi').innerHTML = (getQueryVariable("too"));


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
    var names = "<span class=\"" + curGlyph + "\"> Komraad(id): ";
    nameList = [];
    for (i = 0; i < table.rows('.selected').data().length; i++) { 
        names += table.rows('.selected').data()[i][0] +"; "
        nameList[i] = table.rows('.selected').data()[i][1];
    }
    console.log(nameList);
    namesCell.innerHTML = names;
  
    
}



$('#myForm').submit(function() {
    nameList.push(userCode);
    for(var i =0; i < nameList.length; i++){
            console.log("Posting")
            $.ajax({
                method: 'POST',
                url: enterComrad,
                data: {code: nameList[i], test:testID,_token: token}
            })
            .done(function (msg) {
                console.log(msg);
                if(i == nameList.length -1) {
                    return true;
                }
                
            });
    }
    
});