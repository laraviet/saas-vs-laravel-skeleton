<script>
    function search(e, uri) {
        if (e.keyCode == 13) {
            redirectWithSearch(uri);
        }
    }

    function redirectWithSearch(uri) {
        console.log($('#search-box').val() != null && $('#search-box').val() != '');
        if ($('#search-box').val() != null && $('#search-box').val() != '') {
            window.location.replace(uri + "?filter[search]=" + $('#search-box').val());
        } else {
            window.location.replace(uri);
        }
    }
</script>
