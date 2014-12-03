<script>

var baseTop = $("div#topHeaderBar").offset().top;
$(window).scroll(function () {
    var top = $(window).scrollTop();
    if (top >= baseTop) {
        $("div#topHeaderBar").css({
            "position": "fixed",
                "bottom": "2px"
        });
    } else if (top < baseTop) {
        $("div#topHeaderBar").css({
            "position": "",
                "top": ""
        });
    }
});

</script>