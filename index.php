<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no">
  <title>Redis Workbench</title>
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.2/css/bootstrap.min.css">
  <link rel="stylesheet" href="./css/styles.css">
  <!--[if lt IE 9]>
    <script src="https://oss.maxcdn.com/html5shiv/3.7.2/html5shiv.min.js"></script>
    <script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script>
  <![endif]-->
</head>
<body>
  <div class="container main">
    <div class="page-header">
      <h1>Redis Workbench</h1>
      <p class="lead">A simple web interface written in PHP to manipulate Redis.</p>
    </div>
    <div class="row">
      <div class="col-md-6 col-xs-12">
        <h3>Command</h3>
        <form id="commandForm" class="form-horizontal">
          <div class="form-group">
            <div class="col-xs-12">
              <textarea class="form-control" id="command" name="command" placeholder="KEYS *" rows="8"></textarea>
            </div>
          </div>
          <div class="form-group">
            <div class="col-xs-12">
              <button type="submit" class="col-md-2 col-xs-3 btn btn-primary">Send</button>
            </div>
          </div>
        </form>
      </div>
      <div class="col-md-6 col-xs-12">
        <h3>Result</h3>
        <form id="resultForm" class="form-horizontal">
          <div class="form-group">
            <div class="col-xs-12">
              <textarea class="form-control" id="result" readonly="true" rows="8"></textarea>
            </div>
          </div>
          <div class="form-group">
            <div class="col-xs-12">
              <button type="reset" id="resultReset" class="col-md-2 col-xs-3 btn btn-info">Clear</button>
            </div>
          </div>
        </form>
      </div>
    </div>
  </div>
  <div class="divider"></div>
  <footer class="footer">
    <div class="container">
      <small class="copyright">
        © <?php echo date("Y"); ?>
        <a href="https://lab.mikuru.tw/" target="_blank">kmd's Lab</a>.
        All Rights Reserved.
      </small>
    </div>
  </footer>
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.11.2/jquery.min.js"></script>
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.2/js/bootstrap.min.js"></script>
  <script src="./js/main.js"></script>
</body>
</html>