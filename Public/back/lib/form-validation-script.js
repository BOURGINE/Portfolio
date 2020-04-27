var Script = function () {

    $().ready(function() {
        // validate form when it is submitted
        $("#background_new_form").validate({
            rules: {
                id: "required",
                title: "required",
                year: "required",
                location: "required",
            },
            messages: {
                id: "Ce champs est obligatoire.",
                title: "Ce champs est obligatoire.",
                year: "Ce champs est obligatoire.",
                location: "Ce champs est obligatoire.",
            },
        });

        // validate form when it is submitted
        $("#background_edit_form").validate({
            rules: {
                id: "required",
                title: "required",
                year: "required",
                location: "required",
            },
            messages: {
                id: "Ce champs est obligatoire.",
                title: "Ce champs est obligatoire.",
                year: "Ce champs est obligatoire.",
                location: "Ce champs est obligatoire.",
            },
        });

        // validate form when it is submitted
        $("#post_new_form").validate({
            rules: {
                img: "required",
                title: "required",
                chapo: "required",
                content: "required"
            },
            messages: {
                img: "Ce champs est obligatoire.",
                title: "Ce champs est obligatoire.",
                chapo: "Ce champs est obligatoire.",
                content: "Ce champs est obligatoire."
            },
        });

         // validate form when it is submitted
         $("#post_edit_form").validate({
            rules: {
                img: "required",
                title: "required",
                chapo: "required",
                content: "required"
            },
            messages: {
                img: "Ce champs est obligatoire.",
                title: "Ce champs est obligatoire.",
                chapo: "Ce champs est obligatoire.",
                content: "Ce champs est obligatoire."
            },
        });

        // validate form when it is submitted
        $("#project_new_form").validate({
            rules: {
                img: "required",
                title: "required",
                link: "required"
            },
            messages: {
                img: "Ce champs est obligatoire.",
                title: "Ce champs est obligatoire.",
                link: "Ce champs est obligatoire."
            },
        });

        // Validate form when it is submitted
        $("#project_edit_form").validate({
            rules: {
                img: "required",
                title: "required",
                link: "required"
            },
            messages: {
                img: "Ce champs est obligatoire.",
                title: "Ce champs est obligatoire.",
            },
        });

        // Validate form when it is submitted
        $("#skill_new_form").validate({
            rules: {
                img: "required",
                title: "required",
            },
            messages: {
                img: "Ce champs est obligatoire.",
                title: "Ce champs est obligatoire.",
            },
        });

        // Validate form when it is submitted
        $("#skill_edit_form").validate({
            rules: {
                img: "required",
                title: "required",
            },
            messages: {
                img: "Ce champs est obligatoire.",
                title: "Ce champs est obligatoire.",
            },
        });


        

    });


}();