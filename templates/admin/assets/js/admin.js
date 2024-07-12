$('#toggle-menu').click(function(){
  $('#warraper').toggleClass('small-menu');
});

$('body').on('mouseenter', '#warraper.small-menu #left-menu li a', function(){
  var label = $(this).find('span').text();
  var position = $(this).position();
  
  $('#show-label-menu').stop().fadeIn();
  $('#show-label-menu').text(label);
  $('#show-label-menu').css('top', position.top + 'px');
});

$('body').on('mouseleave', '#warraper.small-menu #left-menu li a', function(){
  $('#show-label-menu').stop().fadeOut();
});

console.log("eve")
