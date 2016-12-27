$('#ShowButton').click(function () {
    var password = $('#password');

    if(password.attr('type') == 'password'){
        password.attr('type','text');
        $('#ShowButton').text('Hide password');
    }else if(password.attr('type') == 'text'){
        password.attr('type','password');
        $('#ShowButton').text('Show password');
    }
});
