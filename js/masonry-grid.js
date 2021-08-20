jQuery(function($){
var $grid =  $('.grid').masonry({
  itemSelector: '.grid-item', // use a separate class for itemSelector, other than .col-
  columnWidth: '.grid-sizer',
  percentPosition: true,
  // fitWidth: true,
});
$grid.imagesLoaded().progress( function() {
  $grid.masonry('layout');
});
});