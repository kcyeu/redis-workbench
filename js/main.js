$(function(){
  $('form#commandForm').submit( function (e) {
    $textarea = $('textarea#result');
    $textarea.text("");
    $textarea.css("background-image","url(http://preloaders.net/preloaders/287/Filling%20broken%20ring.gif)");

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
      function () {
        $textarea.css("background-image","none");      
        $('#result').text($html);
      },1000);
      $('html, body').animate(
        { scrollTop: $( '#result' ).offset().top },
        1000);
    return false;
  });
  $('#resultReset').click( function (e) {
    $('#result').text('');
  });
});
