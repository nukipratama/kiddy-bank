$(document).ready(function () {
    var maxLength = 500;
    $(".show-read-more").each(function () {
        var myStr = $(this).text();
        if ($.trim(myStr).length > maxLength) {
            var newStr = myStr.substring(0, maxLength);
            var removedStr = myStr.substring(maxLength, $.trim(myStr).length);
            var readMoreBtn = `<a href="javascript:void(0);" class="read-more text-dark"><u>Click to read ></u></a>`;
            $(this).empty().html(newStr);
            $(this).append("<span class='dot'>..</span>");
            $(this).append("<span class='more-text'>" + removedStr + "</span>");
            $(this).after(readMoreBtn);
        }
    });
    $(".read-more").click(function () {
        $(".more-text").contents().unwrap();
        $(this).remove();
        $('.dot').remove();
    });
});