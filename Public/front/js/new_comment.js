$(function(){

    $("#form_comment_new").validate({
        rules:{
            pseudo:{
                required: true,
                email: true
            }
        },
        messages:{
            password:{
                required: 'Ce champs est obligatoire.',
                minlength: "Le mot de passe doit comporter au moins 8 caractères.",
                maxlength: "Ce champs ne doit pas dépasser 100 caractères.",
            }
        }
    });
});
