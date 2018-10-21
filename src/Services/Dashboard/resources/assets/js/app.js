/**
 * Basic App object which contains common elements for whole application
 * @type {{}}
 */
$.App = {};
$.App.cruds = {};
$.App.pages = {};
$.App.components = {};

/**
 * For logout form
 */
$.App.components.logout = {

    activate: function () {
        var _this = this;

        _this.initEvents();
    },

    initEvents: function () {
        var _this = this;

        $('body').on('click', '#logout', function () {
            _this.logout();
        })
    },

    logout: function () {
        $('#logout-form').submit();
    }
};

/**
 * Custom dialogs
 * It requires sweetalert plugin
 */
$.App.components.dialogs = {

    activate: function () {
        this.initEvents();
    },

    initEvents: function () {
        var _this = this;

        $('.custom-dialog').on('click', function () {
            var type = $(this).data('dialog-type');

            if (type === 'delete-confirm') {
                _this.showDeleteConfirmDialog(this);
            } else {
                console.log('NO handler defined for such type of dialog');
            }
        });
    },

    /**
     * Dialog for confimation deleting
     * @param caller
     */
    showDeleteConfirmDialog: function (caller) {
        var $caller = $(caller);
        swal({
            title: $caller.data('dialog-title') ? $caller.data('dialog-title') : "Are you sure?",
            text: $caller.data('dialog-text') ? $caller.data('dialog-text') : "You will not be able to rollback this event!",
            type: "warning",
            showCancelButton: true,
            confirmButtonColor: "#DD6B55",
            confirmButtonText: $caller.data('dialog-confirm') ? $caller.data('dialog-confirm') : "Yes, do it!",
            closeOnConfirm: true
        }, function () {
            $caller.closest('form').submit();
        });
    }

};

/**
 * Scripts that will be executed on each form
 * @type {{activate: $.App.form.activate, initEvents: $.App.form.initEvents}}
 */
$.App.components.form = {

    activate: function () {
        this.initEvents();
    },

    initEvents: function () {
        $(".form-submit").on('submit', function () {
            $("input[type='submit']", this)
                .val("Please Wait...")
                .attr('disabled', 'disabled');

            return true;
        });
    }
};

/**
 * Wave effects
 * @type {{activate: $.App.waves.activate, setWaves: $.App.waves.setWaves}}
 */
$.App.components.waves = {

    activate: function () {
        var _this = this;

        _this.setWaves();
    },

    setWaves: function () {
        //Set Waves
        Waves.attach('a.waves-effect', []);
        Waves.attach('button.waves-effect', []);
    }
};

/**
 * Notifications
 * @type {{activate: $.App.components.waves.activate, showNotifications: $.App.components.waves.showNotifications}}
 */
$.App.components.waves = {

    activate: function () {
        this.showNotifications();
    },

    showNotifications: function () {
        if(ntfSuccess) {
            this.showOneNotification(ntfSuccess, 'alert-success');
        }
        if(ntfDanger) {
            this.showOneNotification(ntfDanger, 'alert-danger');
        }
        if(ntfInfo) {
            this.showOneNotification(ntfInfo, 'alert-info');
        }
        if(ntfWarning) {
            this.showOneNotification(ntfWarning, 'alert-warning');
        }
    },

    showOneNotification: function (message, type) {
        $.notify({
            message: message
        }, {
            type: type,
            template: '<div data-notify="container" class="bootstrap-notify-container alert alert-dismissible {0}" role="alert">' +
            '<button type="button" aria-hidden="true" class="close" data-notify="dismiss">×</button>' +
            '<span data-notify="icon"></span> ' +
            '<span data-notify="title">{1}</span> ' +
            '<span data-notify="message">{2}</span>' +
            '<div class="progress" data-notify="progressbar">' +
            '<div class="progress-bar progress-bar-{0}" role="progressbar" aria-valuenow="0" aria-valuemin="0" aria-valuemax="100" style="width: 0%;"></div>' +
            '</div>' +
            '<a href="{3}" target="{4}" data-notify="url"></a>' +
            '</div>'
        });
    }
};

/**
 * Active all custom element for App
 */
$(function () {
    // Activate elements
    $.App.components.logout.activate();
    $.App.components.dialogs.activate();
    $.App.components.form.activate();
    $.App.components.waves.activate();
});