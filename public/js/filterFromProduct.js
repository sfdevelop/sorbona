$(document).ready(function() {
    $('#apply-btn').on('click', function() {
        let activeColors = [];
        $('.category-listt__chek.active').each(function() {
            activeColors.push($(this).data('color_id'));
        });
        let colorIds = activeColors.join(',');
        let url = new URL(window.location.href);
        if (url.searchParams.has('colors')) {
            url.searchParams.set('colors', colorIds);
        } else {
            url.searchParams.append('colors', colorIds);
        }
        window.location.href = url;
    });
});