$(document).ready(function() {

    /**
     * On ajoute la class .form-control à certains champs de type "input"
     **/

    var $form = $('form');
    $form.find('input[type="text"], input[type="password"]').addClass('form-control');

});