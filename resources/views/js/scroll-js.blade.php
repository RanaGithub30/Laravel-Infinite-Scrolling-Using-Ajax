<script>
    var ENDPOINT = "{{ route('user.list.on.scroll') }}";
    var page = 1;
    var isLoading = false;

    $(window).scroll(function() {
        if ($(window).scrollTop() + $(window).height() >= $(document).height() - 100) {
            if (!isLoading) {
                isLoading = true;
                page++;
                infinteLoadMore(page);
            }
        }
    });

    function infinteLoadMore(page) {
        showLoadingPopup(); // Show the loading popup

        $.ajax({
                url: ENDPOINT + "?page=" + page,
                datatype: "html",
                type: "get",
                beforeSend: function() {
                    $('.auto-load').show(); // Optional: For the inline loader
                }
            })
            .done(function(response) {
                if (response.html == '') {
                    $('.auto-load').html("We don't have more data to display :(");
                    return;
                }

                $('.auto-load').hide();
                $("#data-wrapper").append(response.html);
                isLoading = false;
            })
            .fail(function(jqXHR, ajaxOptions, thrownError) {
                console.log('Server error occurred');
                isLoading = false;
            })
            .always(function() {
                hideLoadingPopup(); // Hide the loading popup
            });
    }

    function showLoadingPopup() {
        $('#loadingPopup').fadeIn(); // Show the popup
    }

    function hideLoadingPopup() {
        $('#loadingPopup').fadeOut(); // Hide the popup
    }
</script>