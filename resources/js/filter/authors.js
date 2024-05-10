export function filterAuthors() {
    $('#input-author-search').on('input', function() {
        $.ajax({
            url: '/authors/ajax',
            method: 'GET',
            data: {
                query: this.value
            },
            success: function(response) {
                $('.author-list-item').each(function() {
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
