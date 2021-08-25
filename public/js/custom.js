

$( document ).ready(function() {
    $('select[name^="video"]').select2({
        tags: true,
        multiple: true,
        tokenSeparators: [',', ' ']
    });
});