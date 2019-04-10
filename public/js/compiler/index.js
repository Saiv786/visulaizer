 // var editor = ace.edit("editor");
 //    editor.setTheme("ace/theme/monokai");
 //    editor.getSession().setMode("ace/mode/java");
var editor = ace.edit("coder");
editor.setTheme("ace/theme/monokai");
editor.getSession().setMode("ace/mode/java");
editor.getSession().setUseWorker(false);
    document.getElementById('coder').style.fontSize='16px';

function myFunction(){

    $("#status p").delay(500).fadeOut(200);

    var code = editor.getValue();

    var iframe = document.createElement('iframe');

    var preview = document.getElementById('preview');
    var content = '<!doctype html>' + code;

    preview.appendChild(iframe);

    iframe.contentWindow.document.open('text/htmlreplace');
    iframe.contentWindow.document.write(content);
    iframe.contentWindow.document.close();

    // $("#preview").html(code);

}

// myFunction();s

var timeout;

$('#search-form .search-terms').on('keydown', function(e){
    // get keycode of current keypress event
    var code = (e.keyCode || e.which);

    // do nothing if it's an arrow key
    if(code == 37 || code == 38 || code == 39 || code == 40) {
        return;
    }

    // do normal behaviour for any other key
    $('#search-items #autocom').fadeIn();
});

$("#coder").on('keyup', function() {

    $("#status p").fadeIn(200);

    console.log("yea");

    if(timeout) {
        clearTimeout(timeout);
        timeout = null;
    }

    $("#preview").empty();
    timeout = setTimeout(myFunction, 500)

});