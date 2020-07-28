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
    include '../script/render.php';
    include '../data/boletimData.php';
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
$(document).ready(function(){
  $("div.action").hide();
  var div_id = $('#period').val();
  console.log("###22222##", div_id);
  $("div#"+div_id).show();
});

$('#period').change(function(){
  $("div.action").hide();
  //Selected value
  var div_id = $(this).val();
  console.log("div#"+div_id);
  $("div#"+div_id).show();
});
</script>

</html>