/**
 * Allows you to add data-method="METHOD to links to automatically inject a form
 * with the method on click
 *
 * Example: <a href="{{route('customers.destroy', $customer->id)}}"
 * data-method="delete" name="delete_item">Delete</a>
 *
 * Injects a form with that's fired on click of the link with a DELETE request.
 * Good because you don't have to dirty your HTML with delete forms everywhere.
 */
function addDeleteForms() {
    $('[data-method]').append(function () {
        if (! $(this).find('form').length > 0)
            return "\n" +
                "<form action='" + $(this).attr('href') + "' method='POST' name='delete_item' style='display:none'>\n" +
                "<input type='hidden' name='_method' value='" + $(this).attr('data-method') + "'>\n" +
                "<input type='hidden' name='_token' value='" + $('meta[name="csrf-token"]').attr('content') + "'>\n" +
                "</form>\n";
        else
            return "";
    })
        .removeAttr('href')
        .attr('style', 'cursor:pointer;')
        .attr('onclick', '$(this).find("form").submit();');
}

function load_plugins(){

    /**
     * Add the data-method="delete" forms to all delete links
     */
    addDeleteForms();

    /**
     * Disable all submit buttons once clicked
     */
    $('form').submit(function() {
        $(this).find('input[type="submit"]').attr("disabled", true);
        $(this).find('button[type="submit"]').attr("disabled", true);
        return true;
    });

    // Laravel ajax-token integration
    var _token = $('meta[name="csrf-token"]').attr('content');
    $.ajaxSetup({
        headers: {
            'X-CSRF-TOKEN': _token
        }
    });

    /**
     * Bind all bootstrap tooltips & popovers
     */
    $("[data-toggle='tooltip']").tooltip();

    /**
     * Generic confirm form delete using Sweet Alert
     */
    $('body').on('submit', 'form[name=delete_item]', function(e){
        e.preventDefault();

        let form = this,
            link = $('a[data-method="delete"]'),
            cancel = (link.attr('data-trans-button-cancel')) ? link.attr('data-trans-button-cancel') : "Cancel",
            confirm = (link.attr('data-trans-button-confirm')) ? link.attr('data-trans-button-confirm') : "Yes, delete",
            title = (link.attr('data-trans-title')) ? link.attr('data-trans-title') : "Are you sure you want to do this?";

        swal.fire({
            title: title,
            showCancelButton: true,
            confirmButtonText: 'Confirm',
            cancelButtonText: cancel,
            icon: 'warning'
        }).then((result) => {
            result.value && form.submit();
        });
    })
    .on('submit', 'form[name=confirm-item]', function (e) {
        e.preventDefault();

        Swal.fire({
            title: 'Are you sure you want to do this?',
            showCancelButton: true,
            confirmButtonText: 'Continue',
            cancelButtonText: 'Cancel',
            icon: 'warning'
        }).then((result) => {
            if (result.value) {
                this.submit()
            } else {
                enableSubmitButtons($(this));
            }
        });
    })
    .on('click', 'a[name=confirm-item]', function(e){
        /**
         * Generic 'are you sure' confirm box
         */
        e.preventDefault();

        let link = $(this),
            title = (link.attr('data-trans-title')) ? link.attr('data-trans-title') : "Are you sure you want to do this?",
            cancel = (link.attr('data-trans-button-cancel')) ? link.attr('data-trans-button-cancel') : "Cancel",
            confirm = (link.attr('data-trans-button-confirm')) ? link.attr('data-trans-button-confirm') : "Continue";

        swal.fire({
            title: title,
            showCancelButton: true,
            confirmButtonText: confirm,
            cancelButtonText: cancel,
            icon: 'info',
        }).then((result) => {
            result.value && window.location.assign($(this).attr('href'));
        });
    });

}

/**
 * Place any jQuery/helper plugins in here.
 */
$(function(){
    load_plugins();
});
