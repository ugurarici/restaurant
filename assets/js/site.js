/**
 * Created by omer on 22.08.2015.
 */

$(document).ready(function () {
    $(".catDelButton").click(function () {
        return confirm("Kategoriyi silmeyi onaylıyor musunuz?");
    });
    $(".productDelButton").click(function () {
        return confirm("Ürünü silmeyi onaylıyor musunuz?");
    });
});