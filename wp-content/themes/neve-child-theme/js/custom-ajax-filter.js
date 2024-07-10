jQuery(document).ready(function($) {
    $('#filter').click(function() {
        var resource_type = $('#resource_type').val();
        var resource_topic = $('#resource_topic').val();
        var keyword = $('#keyword').val();

        $.ajax({
            url: ajax_params.ajax_url,
            type: 'post',
            data: {
                action: 'load_resources',
                security: ajax_params.nonce,
                resource_type: resource_type,
                resource_topic: resource_topic,
                keyword: keyword
            },
            success: function(response) {
                $('#resource-container').html(response);
            }
        });
    });
});
