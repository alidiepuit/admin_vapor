$(function () {

  var currentHref = window.location.href
  $('ul.sidebar-menu li a').each(function(i, v) {
    var itemHref = $(v).attr('href');
    if (itemHref == currentHref) {
      $(v).parents().addClass('active');
      $(v).css('color', 'red');
    }
  });
});