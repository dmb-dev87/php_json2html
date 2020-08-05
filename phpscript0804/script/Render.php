<?php

function displayPage($res) {
  echo '<div class="container">';
  iterateIds($res);
  echo '</div>';
}

function iterateIds($json) {
  if ($json["ids"])
  {
    $ids = $json["ids"];
    foreach ($ids as $id) {
      renderId($id);
    }
  }

  if (array_key_exists("DownloadMoreData", $json)) {
    renderLoadTag($json["DownloadMoreData"]);
  }

  return null;
}

function renderId($id) {
  foreach ($id as $key => $val) {
    if ($key === "header") {
      renderHeaderId($val);
    }
    if ($key === "select") {
      renderSelectId($val);
    }
    if ($key === "blocks") {
      iterateBlocks($val);
    }
    if ($key === "trailer") {
      renderTrailerId($val);
    }
  }
}

//<---------- Header --------->//
function renderHeaderId($val) {
  $heads = $val["fields"];
  echo '<div class="header">';
  iterateFields($heads);
  echo '</div>';
}

function iterateFields($heads) {
  foreach ($heads as $head) {
    $label = $head["Label"];
    if (array_key_exists("Value", $head)) {
      $value = $head["Value"];
    } else {
      $value = null;
    }
    renderField($label, $value);
  }  
}

function renderField($label, $value) {
  echo '<div class="row">';
  echo '<p class="label">'.$label . '</p>';
  if ($value !== null) {
    echo '<p class="value">' . $value . '</p>';
  }
  echo '</div>';
}
//<---------- Header --------->//

//<---------- Select --------->//
function renderSelectId($val) {
  $elements = $val;
  $sel_id = "";
  echo '<div class="row selector mg-top">';
  foreach ($elements as $key => $val) {
    if ($key === "Label") {
      $sel_id = str_replace(" ", "", $val);
      echo '<p class="label">'.$val.':</p>';
    }

    if ($key === "Default Value") {
      $default_value = str_replace(" ", "", $val);
    }

    if ($key === "Values") {
      $options = $val;
      echo '<select class="main_sel" id="'.$sel_id.'">';
      foreach ($options as $option) {
        foreach ($option as $optkey => $optval) {
          $selected = $default_value===$optval?' selected':' ';
          echo '<option value="'.str_replace(" ", "", $optval). '" ' . $selected.'>'.$optval.'</option>';
        }
      }
      echo '</select></div>';
    }
    
    if ($key === "Actions" || $key === "actions") {
      $actions = $val;
      foreach($actions as $action) {
        renderAction($action);
      }
    }
  }
}

function renderSubSelectId($val, $parent_divid) {
  $elements = $val;
  $sel_id = "";
  echo '<div class="row selector" style="margin-top: 20px">';
  foreach ($elements as $key => $val) {
    if ($key === "Label") {
      echo '<p class="label">'.$val.':</p>';
      $sel_id = str_replace(" ", "", $val);
    }

    if ($key === "Default Value") {
      $default_value = str_replace(" ", "", $val);
    }

    if ($key === "Values") {
      $options = $val;
      echo '<select class="sub_sel" id="'.$parent_divid.'">';
      foreach ($options as $option) {
        foreach ($option as $optkey => $optval) {
          $selected = $default_value===$optval?' selected':' ';
          echo '<option value="'.str_replace(" ", "", $optval). '" ' . $selected.'>'.$optval.'</option>';
        }
      }
      echo '</select></div>';
    }
    if ($key === "actions") {
      $actions = $val;
      foreach($actions as $action) {
        renderSubAction($action, $parent_divid);
      }
    }
  }
}

function renderAction($action) {
  $elements = $action;
  $sel_id = "";

  foreach($elements as $key => $val) {
    if ($key === "selected value") {
      $div_id = str_replace(" ", "", $val);
      echo '<div class="action col" id="' . $div_id . '">';
    }
    if ($key === "blocks") {
      iterateBlocks($val);  
    }
    if ($key === "trailer") {
      renderTrailerId($val);  
    }
    if ($key === "select") {
      renderSubSelectId($val, $div_id);
    }
  }

  echo '</div>';
}

function renderSubAction($action, $parent_divid) {
  $elements = $action;
  $sel_id = "";

  foreach($elements as $key => $val) {
    if ($key === "selected value") {
      $div_id = $parent_divid . '_' . str_replace(" ", "", $val);
      echo '<div class="subaction col" id="' . $div_id . '">';
    }
    if ($key === "blocks") {
      iterateBlocks($val);  
    }
    if ($key === "trailer") {
      renderTrailerId($val);  
    }
    if ($key === "select") {
      renderSubSelectId($val, $div_id);
    }
  }

  echo '</div>';
}

function iterateBlocks($val) {
  $blocks = $val;
  foreach ($blocks as $block) {
    renderBlock($block);
  }
}

function renderBlock($block) {
  $table_class = "";
  echo '<div class="row">';
  if (array_key_exists("barcolor", $block))
  {
    renderBar($block["barcolor"]);
  }
  echo '<div class="col block">';
  if (array_key_exists("Header text", $block)) {
    $headerText = $block["Header text"];
    renderHeaderBlock($headerText);
    $table_class = "header-table";
  }  
  if (array_key_exists("Columns", $block)) {
    echo '<div class="w3-padding w3-white notranslate table-responsive">';
    echo '<table class="table ' . $table_class . '">';
    iterateColumns($block["Columns"]);
    if (array_key_exists("Lines", $block)) {
      iterateLines($block["Lines"]);
    }
    echo '</table></div>';
  }

  if (array_key_exists("Trailer", $block)) {
    $trailerContent = $block["Trailer"]["htmlcontent"];
    renderTrailerBlock($trailerContent);
  } else if (array_key_exists("trailer", $block)) {
    $trailerContent = $block["trailer"]["htmlcontent"];
    renderTrailerBlock($trailerContent);
  }  
  echo '</div></div>';
}

function renderBar($color) {
  echo '<div class="col block-bar" style="background-color: ' . $color . '; border-color: ' . $color . '"></div>';
}

function renderHeaderBlock($headerText) {
  echo '<div class="block-title">' . $headerText . '</div>';
}

function iterateColumns($columns) {
  echo '<thead class="thead-light">';
  echo '<tr>';
  foreach ($columns as $column) {
    $title = $column["Title"];
    $width = $column["Width"];
    renderColumn($title, $width);
  }
  echo '</tr></thead>';
}

function renderColumn($title, $width) {
  $width = str_replace(" ","", $width);
  if ($title == "")
    echo '<th style="width:' . $width . '; display:none;">' . $title . '</th>';
  else
    echo '<th style="width:' . $width . '">' . $title . '</th>';
}

function iterateLines($lines) {
  echo '<tbody>';
  foreach ($lines as $line) {
    iterateCells($line);
  }
  echo '</tbody>';
}

function iterateCells($line) {
  $cells = $line["Columns"];
  echo '<tr>';
  foreach ($cells as $cell) {
    if (array_key_exists("Falta", $cell)) {
      $value = $cell["Falta"];
    }
    if (array_key_exists("Value", $cell)) {
      $value = $cell["Value"];
    }
    if (array_key_exists("val", $cell)) {
      $value = $cell["val"];
    }
    if (array_key_exists("link", $cell)) {
      $url = $cell["link"];
    } else {
      $url = NULL;
    }
    if (array_key_exists("Notification State", $cell)) {
      $color = $cell["Notification State"];
    } else if (array_key_exists("color", $cell)) {
      $color = $cell["color"];
    } else {
      $color = NULL;
    }
    if (array_key_exists("horizontal align", $cell)) {
      $align = $cell["horizontal align"];
    } else {
      $align = "";
    }
    renderCell(nl2br($value), $color, $align, $url);
  }
  echo '</tr>';
}

function renderCell($value, $color, $align, $url) {
  $value = str_replace(" %","%", $value);
  if ($color !== NULL ) {
      if ($color === "SUCCESS") {
        echo '<td><div class="bg-success notify">' . $value . '</div></td>';
      } else if ($color === "DANGER") {
        echo '<td><div class="bg-danger notify">' . $value . '</div></td>';
      } else if ($color === "WARNING") {
        echo '<td><div class="bg-warning notify">' . $value . '</div></td>';
      } else if ($color === "INFO") {
        echo '<td><div class="bg-info notify">' . $value . '</div></td>';
      } else {
        echo '<td style="color:' . $color . '">' . $value . '</td>';
      }
    } else if ($url !== NULL){
      echo '<td style="text-align: '. $align .'"><a href="'. $url .'" target="_top">' . $value . '</a></td>';
    } else {
      echo '<td style="text-align: '. $align .'">' . $value . '</td>';
    }
 }

function renderTrailerBlock($val) {
  if ($val !== NULL) {
    echo '<div class="trailer">' . $val . '</div>';
  }
}

function renderTrailerId($val) {
  echo '
  <div class="footer">
  '.$val["htmlcontent"].'
  </div>';
}

function renderLoadTag($val) {
  if (array_key_exists("link", $val)) {
    echo '<a href="'.$val["link"].'" class="btn btn-success button">'.$val["Caption"].'</a>';
  }
}

?>