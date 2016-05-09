console.log('loaded js');
function save() {
    var textToSave = document.getElementById("about_text").innerHTML;
    
    $.ajax({
            method: 'POST',
            url: urlChange,
            data: {abouttext: textToSave,by:"about" , _token: token}
        })
        .done(function (msg) {
            console.log(msg);
            document.getElementById("save_message").innerHTML="Saved";
            console.log(textToSave);
        });
    
    
}

