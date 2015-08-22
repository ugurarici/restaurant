/**
 * Created by omer on 22.08.2015.
 */

$(document).ready(function () {
    $(".catDelButton").click(function () {
        var id = $(this).attr("data-id");
        var conf = confirm("Silmek istediğinize emin misiniz?");
        if (conf == true) {
            window.location = "http://localhost/pr-restaurant/menuTasks.php?task=catDelete&id=" + id;
        }
    });
    $(".productDelButton").click(function () {
        var id = $(this).attr("data-id");
        var conf = confirm("Silmek istediğinize emin misiniz?");
        if (conf == true) {
            window.location = "http://localhost/pr-restaurant/menuTasks.php?task=productDelete&id=" + id;
        }
    });
});