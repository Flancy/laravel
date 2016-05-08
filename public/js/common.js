$(document).ready(function(){
    //Settings
    var data_save = true;
    var submit_personal = $('#submit-personal');
    var submit_password = $('#submit-password');
    var personal_form = $('#personal-form');
    var password_form = $('#password-form');

    $(submit_personal).click(function(){
        urlForm = $(personal_form).attr('action');
        if (data_save === true) {
            data_save = false;
            $(submit_personal).attr('data-save','true');
            $(submit_personal).html('<i class="fa fa-floppy-o" aria-hidden="true"></i><span>сохранить</span>');
            $('.personal-form input').each(function(i,elem) {
                $(this).removeAttr('readonly');
            });
        }
        else if (data_save === false) {
            data_save = true;
            $(submit_personal).attr('data-save','false');
            $(submit_personal).html('<i class="fa fa-pencil" aria-hidden="true"></i><span>редактировать</span>');
            $('.personal-form input').each(function(i,elem) {
                $(this).attr('readonly', 'true');
            });
            $.ajax({
                type: "POST",
                url: urlForm,
                data: $(personal_form).serialize(),
                success: function( data ) {
                    console.log(data);
                }
            });
        }
    });

    $(submit_password).click(function(){
        urlForm = $(password_form).attr('action');
        $.ajax({
            type: "POST",
            url: urlForm,
            data: $(password_form).serialize(),
            success: function( data ) {
                console.log(data);
            }
        });
    });
});
