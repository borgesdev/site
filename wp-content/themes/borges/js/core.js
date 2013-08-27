/* resolvendo conflito*/
/* resolvendo conflito2*/
$('#assunto').change(function() {

    if ($(this).val() == 'Envio de Currículo')
        $('#arquivoUpload').show('slow');
    else
        $('#arquivoUpload').hide();

});


$('#form-contato').submit(function() {

    $('.erro').hide();
    var erro = false;

    // Valida nome
    if ($('#nome').val().length < 3) {
        $('#nome').next().show();
        erro = true;
    }


    // Valida email
    var email = $("#email").val();
    var emailFilter = /^.+@.+\..{2,}$/;
    var illegalChars = /[\(\)\<\>\,\;\:\\\/\"\[\]]/
    if (!(emailFilter.test(email)) || email.match(illegalChars)) {
        $('#email').next().show();
        erro = true;
    }

    // Valida assunto
    if ($('#assunto').val() == '') {
        $('#assunto').next().show();
        erro = true;
    }

    // Valida mensagem
    if ($('#msg').val() == '') {
        $('#msg').next().show();
        erro = true;
    }

    // Verifica se ocorreu algum erro
    if (erro) {
        alert("O formulário não foi preenchido corretamente.");
        return false;
    } else {
        return true;
    }


});


var submenuDelay = 0;

$("#menu-item-foccus").hover(function() {
    $('#submenu-noticias').hide();
    clearTimeout(submenuDelay);
    $('#submenu-foccus').slideDown(250);
}, function() {
    submenuDelay = setTimeout(function() {
        $('#submenu-foccus').slideUp(150);
    }, 250);
});

$("#submenu-foccus").hover(function() {
    $('#submenu-noticias').hide();
    clearTimeout(submenuDelay);
    $('#submenu-foccus').slideDown(250);
}, function() {
    submenuDelay = setTimeout(function() {
        $('#submenu-foccus').slideUp(150);
    }, 250);
});

$("#menu-item-noticias").hover(function() {
    $('#submenu-foccus').hide();
    clearTimeout(submenuDelay);
    $('#submenu-noticias').slideDown(250);
}, function() {
    submenuDelay = setTimeout(function() {
        $('#submenu-noticias').slideUp(150);
    }, 250);
});

$("#submenu-noticias").hover(function() {
    $('#submenu-foccus').hide();
    clearTimeout(submenuDelay);
    $('#submenu-noticias').slideDown(250);
}, function() {
    submenuDelay = setTimeout(function() {
        $('#submenu-noticias').slideUp(150);
    }, 250);
});


$("#menu-item-foccus-mobile").click(function() {
    $('#submenu-foccus-mobile').toggle('slow');
});

$("#menu-item-noticias-mobile").click(function() {
    $('#submenu-noticias-mobile').toggle('slow');
});


$('.menu-mobile-icon > a').click(function() {
    var menuDisplay = $('.menu-mobile').css('display');
    
    if (menuDisplay === 'none')
        $('.menu-mobile').slideDown('slow');
    else
        $('.menu-mobile').slideUp('slow');
});

