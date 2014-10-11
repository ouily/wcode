$(document).ready(function() {

    /**
     * On ajoute la class .form-control à certains champs de type "input"
     **/

    var $form = $('form');
    $form.find('input[type="text"], input[type="password"], textarea').addClass('form-control');

    /**
     * Gestion du menu
     **/

    var path = window.location.pathname;
    var $navbar = $('.nav.navbar-nav:eq(0)');
    $navbar.find('li').removeClass('active');
    $navbar.find('li a[href="' + path + '"]').parent().addClass('active');

});