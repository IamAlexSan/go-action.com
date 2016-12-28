$('#visability').click(function () {
    var password = $('#password');

    if(password.attr('type') == 'password'){

        password.attr('type','text');
        $('#visability').text('Hide password');

        $('#visability').attr('src','/Layouts/images/visible-hover.png');

    }else if(password.attr('type') == 'text'){

        password.attr('type','password');
        $('#visability').text('Show password');

        $('#visability').attr('src','/Layouts/images/visible.png');

    }
});


$("#recovery").hover(function(){
    $("#Mail, #Login").css("border", "3px solid greenyellow");
    $("#Mail, #Login").css("color", "greenyellow");
}, function(){
    $("#Mail, #Login").css("border-color", "grey");
    $("#Mail, #Login").css("color", "black");
});

$("#SignIn").hover(function(){
    $("#password, #Login").css("border", "3px solid #2aabd2");
    $("#password, #Login").css("color", "#2aabd2");
}, function(){
    $("#password, #Login").css("border-color", "grey");
    $("#password, #Login").css("color", "black");
});

$("#Join").hover(function(){
    $("#password, #Login, #Mail").css("border", "3px solid #b92c28");
    $("#password, #Login, #Mail").css("color", "#b92c28");
}, function(){
    $("#password, #Login, #Mail").css("border-color", "grey");
    $("#password, #Login, #Mail").css("color", "black");
});