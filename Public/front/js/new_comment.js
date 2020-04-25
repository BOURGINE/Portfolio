$(function(){

    $("#form_comment").validate({
        rules: {
            content: {
                required: true,
                minlength: 10,
                maxlength: 2000
            }
        },
        messages: {
            content:{
                required: 'Vous ne pouvez soumettre un commentaire vide.',
                minlength: "Votre commentaire doit comporter au moins 10 caractères.",
                maxlength: "Votre commentaire dépasse les 2000 caractères autorisés."
            }
        }
    });
});
