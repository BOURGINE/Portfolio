$(function(){
    
    $("#form_login").validate({
        rules:{
            pseudo:{
                required: true,
                email:true,
                minlength: 5
            },
            password:{
                required: true,
                minlength: 8
            }
        },
        messages:{
            pseudo:{
                required: 'Ce champs est obligatoire.',
                email: 'Veuillez entrer une adresse mail valide',
                minlength: "Ce champs doit comporter au moins 5 caractères."
            },
            password:{
                required: 'Ce champs est obligatoire.',
                minlength: "Ce champs doit comporter au moins 8 caractères."
            },
        }
    });
});
