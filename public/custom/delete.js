

$(document).ready(function()
{
    $('.delete-toggle').on('click', function (e) {
        e.preventDefault();

        var deleteLink = $(this).data('action');
        $('#delete-form').attr('action', deleteLink);

        $('#delete-modal').modal('show');
    });
});