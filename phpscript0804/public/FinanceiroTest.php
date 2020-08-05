<!DOCTYPE html>
<html lang="en">

<head>
  <title>Bootstrap 4 Website Example</title>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.0/css/bootstrap.min.css">
  <link rel="stylesheet" href="../asset/css/jsontohtml.css">
</head>

<body>
  <?php
    include '../script/Render.php';
    include '../data/FinanceiroData.php';
    $data = connect();
    if ($data !== null) {
      displayPage($data);
    }
  ?>

</body>
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.16.0/umd/popper.min.js"></script>
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.0/js/bootstrap.min.js"></script>

<script>

function showHideChnage() {
  $("div.action").hide();

  var main_div = $("select.main_sel").val();
  
  $("div#" + main_div).show();
  $("div#" + main_div).children().hide();

  $("div.selector").show();
  var sub_div = $("select#"+main_div).val();  
  var div_id = main_div + "_" + sub_div;
  $("div#"+div_id).show();
}

$(document).ready(function(){
  showHideChnage();

  $('select.sub_sel').change(function() {
    showHideChnage();
  });

  $('select.main_sel').change(function() {
    showHideChnage();
  });
});

</script>

</html>