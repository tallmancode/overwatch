$(document).ready(function () {
    var appContainer = $('.main');
    $(".hamburger").on('click', function () {
        appContainer.toggleClass("expanded");

        if ($(this).hasClass('is-active')) {
            window.localStorage.setItem('overwatch.stickySidebar', true);
        } else {
            window.localStorage.setItem('overwatch.stickySidebar', false);
        }
        $(this).toggleClass('is-active');
    });

    if(window.localStorage && window.localStorage['overwatch.stickySidebar'] == 'true') {
        appContainer.toggleClass("expanded");
        $(".hamburger").toggleClass('is-active');
    }
});
