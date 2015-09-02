/**
 * Created by omer on 22.08.2015.
 */

$(document).ready(function () {
    $(".confirmation").click(function () {
        var message = "İşlemi onaylıyor musunuz?";
        if($(this).attr("data-confmes")) message = $(this).data("confmes");
        return confirm(message);
    });

    (function ($) {

        $('#filter').keyup(function () {

            var rex = new RegExp($(this).val(), 'i');
            $('.searchOrder tr').hide();
            $('.searchOrder tr').filter(function () {
                return rex.test($(this).text());
            }).show();

        })

    }(jQuery));

});
