$(document).ready(function()
{
    var result =true;

    alert('toto');

    //EVENT:1 SUBMIT
        //INCIDENCES: BORDURES ET MESSAGE_ERROR 
    $('#form_contact').submit(function()
    {
        alert('toto2');
        /* identité */
        if($('#identity').val()=="")
        {
            $('#identity').css('border','2px red solid','!important');
            $('#identity').prev('.error').fadeIn('fast').text('champs obligatoire');
            result=false;
        }
        /* eemail */
        if($('#email').val()=="")
        {
            $('#email').css('border','2px red solid','!important');
            $('#email').prev('.error').fadeIn('fast').text('champs obligatoire');
            result=false;
        }
        /* subject */
        if($('#subject').val()=="")
        {
            $('#subject').css('border','2px red solid','!important');
            $('#subject').prev('.error').fadeIn('fast').text('champs obligatoire');
            result=false;
        }
        /* content */
        if($('#message').val()=="")
        {
            $('#message').css('border','2px red solid','!important');
            $('#message').prev('.error').fadeIn('fast').text('champs obligatoire');
            result=false;
        }
        return result;
    });



   //EVENT:2 KEYPRESS(keyup)
        //INCIDENCES: BORDURES ET MESSAGE_ERROR
         
    /* identité */
    $('#identity').keyup(function()
    {
        if($('#identity').val().length<5)
        {
            $('#identity').css('border','2px red solid','!important');
            $('#identity').prev('.error').fadeIn('fast').text('Doit contenir entre 5 et 25 caractères');
            result=false;
        }
        else if($('#identity').val().length>=26)
        {
            $('#identity').css('border','2px red solid','!important');
            $('#identity').prev('.error').fadeIn('fast').text('Vous avez dépassé les 25 caractères');
            result=false;
        }
        else
        {
            $('#identity').css('border','2px green solid','!important');
            $('#identity').prev('.error').fadeOut();
            result=true;
        }
        return result;
    });
    /* email */
    $('#email').keyup(function(){

        if($('#email').val().length<4)
        {
            $('#email').css('border','2px red solid','!important');
            $('#email').prev('.error').fadeIn('fast').text('Vous devez entrer un format email');
            result=false;
        }
        else {
            $('#email').css('border','2px green solid','!important');
            $('#email').prev('.error').fadeOut();
            result= true;
        }
        return result;
    });
    /* subject */ 
    $('#subject').keyup(function(){

        if($('#subject').val().length<5)
        {
            $('#subject').css('border','2px red solid','!important');
            $('#subject').prev('.error').fadeIn('fast').text('Vous devez entrez entre 5 et 25 caractères');
            result=false;
        }
        else if($('#subject').val().length>=25)
        {
            $('#subject').css('border','2px red solid','!important');
            $('#subject').prev('.error').fadeIn('fast').text('Vous avez dépassé les 25 caractères');
            result=false;
        }
        else {
            $('#subject').css('border','2px green solid','!important');
            $('#subject').prev('.error').fadeOut();
            result= true;
        }
        return result;
    });
    /* message */ 
    $('#message').keyup(function(){
        if($('#message').val().length<10)
        {
            $('#message').css('border','2px red solid','!important');
            $('#message').prev('.error').fadeIn('fast').text('Vous devez entrez entre 10 et 1000 caractères');
            result=false;
        }
        else if($('#message').val().length>=1000)
        {
            $('#message').css('border','2px red solid','!important');
            $('#message').prev('.error').fadeIn('fast').text('Vous avez dépassé les 1000 caractères');
            result=false;
        }
        else
        {
            $('#message').css('border','2px green solid','!important');
            $('#message').prev('.error').fadeOut();
            result= true;
        }
        return result;
    });

});