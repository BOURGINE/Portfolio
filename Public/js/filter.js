$(document).ready(function(){

    $('.category_item').click(function()
    {
        var category = $(this).attr('id');

        if(category == 'all')
        {
            $('.element_item').addClass('hide');

            setTimeout(function()
            {
                $('.element_item').removeClass('hide');
            }, 1200);
        }

        else
        {
            $('.element_item').addClass('hide');

            setTimeout(function()
            {
                $('.'+category).removeClass('hide');
            }, 600);
        }
    });

});