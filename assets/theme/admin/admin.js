ABase.ready(function () {
    ABase.click(".menu-sub", function (item, e) {
        if (item.hasClass("menu-active")) {
            item.removeClass("menu-active");
        } else {
            item.addClass("menu-active");
        }
    })
})