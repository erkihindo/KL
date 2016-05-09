
console.log('loaded');
var data = [];
var metadata = [];
window.onload = function() {

				// this approach is interesting if you need to dynamically create data in Javascript 
				
				metadata.push({ name: "no", label: "#", datatype: "string", editable: true});
				metadata.push({ name: "name", label:"Tunniteema", datatype: "string", editable: true});
				metadata.push({ name: "mate", label: "Materjalid", datatype: "string", editable: true});
				metadata.push({ name: "comm", label: "Kommentaar", datatype: "string", editable: true});
                metadata.push({ name: "delete", label: "DELETE", datatype: "boolean", editable: true});
		

				

				
				data.push({});
                data.push({id: 1, values: [1,"hello","Link","hello.", false]});
				data.push({id: 2, values: [2,"Prototüüpimine paberil","Link","Too kaasa paberit."]});
	
		         
				editableGrid = new EditableGrid("DemoGridJsData");
				editableGrid.load({"metadata": metadata, "data": data});
				editableGrid.renderGrid("tablecontent", "table");
    
}


function add(){
        //
        editableGrid.append(0, {"no":0,"name":"-",mate:"Link"}, true, true);
       
    }

function del(){
        for(i = 0; i < editableGrid.getRowCount(); i++) {
            if( editableGrid.getValueAt(i,4)) {
                editableGrid.remove(i);
                del();
                break;
            }
        }
    }


function save() {
    var textToSave = document.getElementById("home_text").innerHTML;
    
    $.ajax({
            method: 'POST',
            url: urlChange,
            data: {hometext: textToSave,by:"home" , _token: token}
        })
        .done(function (msg) {
            console.log(msg);
            document.getElementById("save_message").innerHTML="Saved";
            console.log(textToSave);
        });
    
}

