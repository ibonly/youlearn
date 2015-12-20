/**
 * suucess modal message
 *
 * @param  message
 */
function successMessage (message)
{
    swal("Done", message, "success");
}

/**
 * Success message modal box with redirect
 *
 * @param message
 */
function successMessageRedirect (message, redirectURL)
{
    swal({
        title: "Done!",
        text: message,
        type: "success",
        showCancelButton: false,
        closeOnConfirm: false,
        showLoaderOnConfirm: true,
        },
        function (){
            document.location.href = redirectURL;
        }
    );
}
/**
 * error modal message
 */
function errorMessage (message)
{
    swal("Error", message, "error");
}

/**
 *confirmDelete modal message
 *
 * @param  url
 * @param  parameter
 * @param  name
 */
function confirmDelete (url, parameter, title)
{
    swal({
        title: "Delete "+ title +"?",
        text: "You will not be able to recover this imaginary file!",
        type: "warning",
        showCancelButton: true,
        confirmButtonColor: "#DD6B55",
        confirmButtonText: "Yes, delete it!",
        cancelButtonText: "No, cancel plx!",
        closeOnConfirm: false,
        closeOnCancel: false
    },
    function ( isConfirm )
    {
        if( isConfirm ) {
            processAjax("DELETE", url, parameter);
        } else {
            cancelDeleteMessage( title );
        }
    });
}

/**
 * cancelDeleteMessage modal message
 *
 * @param  name
 */
function cancelDeleteMessage (title)
{
    swal("Cancelled", "Channel " + title + " is still available", "error");
}

/**
 * processAjax Proccess the ajax call
 *
 * @param  url
 * @param  parameter
 */
function processAjax (action, url, parameter)
{

    $.ajax({
        url: url,
        type: action,
        data: parameter,
        success: function(response) {
            switch( response.status_code )
            {

                case 201:
                    document.location.href = "/";
                    break;

                case 202:
                    return successMessageRedirect( response.message, response.url );
                    break;

                case 200:
                    return successMessage( response.message );
                    break;

                default: errorMessage( response.message );
            }
        }
    });
}

$(document).ready(function(){

    /**
     * onSubmit event to handle login
     */
    $(".form-signin").submit( function () {
        var url      = "/login";
        var token    = $("#token").val();
        var username = $("#username").val();
        var password = $("#password").val();
        var data     =
            {
                url        : url,
                parameter  :
                {
                    _token     : token,
                    username   : username,
                    password   : password
                }
            }
        processAjax("POST", data.url, data.parameter);

        return false;
    });

    /**
     * onSubmit event to handle registration
     */
    $(".form-signup").submit( function () {
        var url      = "/register";
        var token    = $("#token").val();
        var username = $("#username").val();
        var email    = $("#email").val();
        var password = $("#password").val();
        var avatar   = $("#avatar").val();
        var data     =
            {
                url        : url,
                parameter  :
                {
                    _token     : token,
                    username   : username,
                    email      : email,
                    password   : password,
                    avatar     : avatar
                }
            }
        processAjax("POST", data.url, data.parameter);

        return false;
    });

    /**
     * onSubmit event to handle registration
     */
    $("#video-upload").submit( function () {
        var url         = "/video/upload";
        var token       = $("#token").val();
        var video_id    = $("#video_id").val();
        var user_id     = $("#user_id").val();
        var category_id = $("#category_id").val();
        var title       = $("#title").val();
        var videoURL         = $("#url").val();
        var description = $("#description").val();
        var data        =
            {
                url        : url,
                parameter  :
                {
                    _token      : token,
                    video_id    : video_id,
                    user_id     : user_id,
                    category_id : category_id,
                    title       : title,
                    url         : videoURL,
                    description : description
                }
            }
        processAjax("POST", data.url, data.parameter);

        return false;
    });

    /**
     * onSubmit event to handle video edit
     */
    $("#video-edit").submit( function () {
        var url         = "/video/edit";
        var token       = $("#token").val();
        var video_id    = $("#video_id").val();
        var user_id     = $("#user_id").val();
        var category_id = $("#category_id").val();
        var title       = $("#title").val();
        var videoURL         = $("#url").val();
        var description = $("#description").val();
        var data        =
            {
                url        : url,
                parameter  :
                {
                    _token      : token,
                    video_id    : video_id,
                    user_id     : user_id,
                    category_id : category_id,
                    title       : title,
                    url         : videoURL,
                    description : description
                }
            }
        processAjax("PUT", data.url, data.parameter);

        return false;
    });


    /**
     * onSubmit event to handle registration
     */
    $(".user-update").submit( function () {
        var url        = "/user/update";
        var username   = $("#username").val();
        var token      = $("#token").val();
        var email      = $("#email").val();
        var password   = $("#password").val();
        var data       =
            {
                url        : url,
                parameter  :
                {
                    _token     : token,
                    username   : username,
                    email      : email,
                    password   : password
                }
            }
        processAjax("PUT", data.url, data.parameter);

        return false;
    });

    $("#deleteVideo").click( function () {
        var title   = $(this).data("title");
        var token   = $(this).data("token");
        var id      = $(this).data("id");
        var url     = "/video/"+ id +"/delete";
        var data    =
            {
                url        : url,
                parameter  :
                {
                    _token     : token,
                }
            }
        confirmDelete(data.url, data.parameter, title );

        return false;
    });

});