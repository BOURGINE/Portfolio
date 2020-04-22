$(function(){
    
    $("#form_contact").validate({
        rules:{
            identity: {
                required: true,
                minlength: 5,
                maxlength: 255
            },
            email: {
                required: true,
                email:true,
                minlength:7,
                maxlength: 50
            },
            subject: {
                required: true,
                minlength:10,
                maxlength: 255
            },
            content: {
                required: true,
                minlength:25,
                maxlength: 2000
            }
        },
        messages: {
            identity: {
                required: 'Ce champs est obligatoire.',
                minlength: "Ce champs doit contenir au moins 5 caractères.",
                maxlength: "Ce champs ne doit dépasser 255 caractères."

            },
            email: {
                required: 'Ce champs est obligatoire.',
                email: 'Veuillez entrer une adresse mail valide.',
                minlength: "Ce champs doit contenir au moins 7 caractères.",
                maxlength: "Ce champs ne doit dépasser 50 caractères."

            },
            subject: {
                required: 'Ce champs est obligatoire.',
                minlength: "Ce champs doit contenir au moins 10 caractères.",
                maxlength: "Ce champs ne doit dépasser 255 caractères."


            },
            content: {
                required: 'Ce champs est obligatoire.',
                minlength: "Ce champs doit contenir au moins 25 caractères.",
                maxlength: "Ce champs ne doit dépasser 2000 caractères."
            },
        }
    });
});
