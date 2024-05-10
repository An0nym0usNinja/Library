export function filterGenres() {
    $('#input-genre-search').on('input', function() {
        $.ajax({
            url: '/genres/ajax',
            method: 'GET',
            data: {
                query: this.value
            },
            success: function(response) {
                $('.genre-list-item').each(function() {
                    if (response.data.includes(this.children[0].children[1].innerHTML)) {
                        $(this).show();
                    } else {
                        $(this).hide();
                    }
                });
            }
        });
    });
}
