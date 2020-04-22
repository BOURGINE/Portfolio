$(function(){
    
    jQuery.validator.addMethod(
        "regex",
         function(value, element, regexp) {
             if (regexp.constructor != RegExp)
                regexp = new RegExp(regexp);
             else if (regexp.global)
                regexp.lastIndex = 0;
                return this.optional(element) || regexp.test(value);
         },"Le mot de passe doit contenir au moins une lettre majuscule, une lettre miniscule, un chiffre et un caractère spécial."
      );

    $("#form_register").validate({
        rules:{
            pseudo:{
                required: true,
                email:true
            },
            password: {
                required: true,
                minlength: 8,
                maxlength: 100,
                regex: /^(?=.*?[A-Z])(?=.*?[a-z])(?=.*?[0-9])(?=.*?[#?!@$ %^&*-]).{8,}$/
            },
            confirm_password:{
                required: true,
                equalTo: "#password"
            }
        },
        messages:{
            pseudo:{
                required: 'Ce champs est obligatoire.',
                email: 'Veuillez entrer une adresse mail valide.'
            },
            password:{
                required: 'Ce champs est obligatoire.',
                minlength: "Le mot de passe doit comporter au moins 8 caractères.",
                maxlength: "Ce champs ne doit pas dépasser 100 caractères.",
                regex: "Le mot de passe contenir au moins une lettre majuscule, une lettre miniscule, un chiffre et un caractère spécial."
            },
            confirm_password:{
                required: 'Ce champs est obligatoire.',
                equalTo: "Les mots de passe ne sont pas idéntiques."

            }
        }
    });
});
