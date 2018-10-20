/**
 * Unauthorized App object
 * @type {{}}
 */
$.App = {};
$.App.pages = {};

/**
 * Scripts for sign in page
 * @type {{activate: $.App.pages.signIn.activate, setValidators: $.App.pages.signIn.setValidators}}
 */
$.App.pages.signIn = {

    activate: function () {
        var _this = this;

        _this.setValidators();
    },

    setValidators: function () {

        $('#sign-in').validate({
            highlight: function (input) {
                $(input).parents('.form-line').addClass('error');
            },
            unhighlight: function (input) {
                $(input).parents('.form-line').removeClass('error');
            },
            errorPlacement: function (error, element) {
                $(element).parents('.input-group').append(error);
            }
        });

    }

};

/**
 * Scripts for forgot password page
 * @type {{activate: $.App.pages.forgotPassword.activate, setValidators: $.App.pages.forgotPassword.setValidators}}
 */
$.App.pages.forgotPassword = {

    activate: function () {
        var _this = this;

        _this.setValidators();
    },

    setValidators: function () {

        $('#forgot-password').validate({
            highlight: function (input) {
                $(input).parents('.form-line').addClass('error');
            },
            unhighlight: function (input) {
                $(input).parents('.form-line').removeClass('error');
            },
            errorPlacement: function (error, element) {
                $(element).parents('.input-group').append(error);
            }
        });

    }

};

/**
 * Active all custom element for App App
 */
$(function () {
    // Activate elements
    $.App.pages.signIn.activate();
    $.App.pages.forgotPassword.activate();
});