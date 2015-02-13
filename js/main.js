$(function(){
  $('form#commandForm').submit( function (e) {
//    $('#loading').html('<img src="http://preloaders.net/preloaders/287/Filling%20broken%20ring.gif"> loading...');
    var formData = new FormData($(this)[0]);
    $.ajax({
      url: './command.php',
      type: 'POST',
      data: formData,
      async: false,
      success: function (d) {
        console.log(d);
        $html = (d.result == '') ? '(empty list or set)' : d.result;
      },
      error: function (d) {
        $html = 'Something went wrong...';
      },
      cache: false,
      contentType: false,
      processData: false
    });
    setTimeout(
      function () {$('#result').text($html);},1000);
    $('html, body').animate(
      { scrollTop: $( '#result' ).offset().top },
      1000);
    return false;
  });
  $('#resultReset').click( function (e) {
    $('#result').text('');
  });
});
