var elementTop = $('.nav').offset().top;

$(window).scroll(function(){
    if( $(window).scrollTop() >= elementTop){
        $('body').addClass('nav_fixed');
    }else{
        $('body').removeClass('nav_fixed');
    }
});

$('.btn-menu').on('click', function(){
    $('.nav').toggleClass('nav-toggle');
});

function vermas(parrafo,boton){
    if(document.getElementById(parrafo).style.display=='block'){
        document.getElementById(parrafo).style.display = 'none';
        document.getElementById(boton).innerHTML = 'Ver más';
    }else{
        document.getElementById(parrafo).style.display = 'block';
        document.getElementById(boton).innerHTML = 'Ocultar';
    }
}
