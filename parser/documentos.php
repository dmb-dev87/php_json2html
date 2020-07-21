<?php

function displayPage() {
  $res = connect();

  if ($res === NULL) 
    return 0;
  echo '<div class="container">';

  iterateIds($res);    
}

function connect() {

/*
 * Add API URL here
 */
//  $url = "http://jsonurlXXXXX"; 
//  $data = file_get_contents($url);

// test json data
    $data = '{
        "ids": [
          {
            "id": "1234",
            "header": {
              "style": "card",
              "fields": [
                {
                  "Label": "Nome :",
                  "Value": "here goes kid name"
                },
                {
                  "Label": "Turma :",
                  "Value": "1 Ano A"
                }
              ]
            },
            "blocks": [
              {
                "Header text": "Documento",
                "barposition": "left",
                "barcolor": "red",
                "Columns": [
                  {
                    "Title": "Documento",
                    "Width": "100 %"
                  },
                  {
                    "Title": "2020",
                    "Width": "100 px"
                  },
                  {
                    "Title": "2019",
                    "Width": "100 px"
                  }
                ],
                "Lines": [
                  {
                    "minHeight" : "100 px",
                    "Columns": [
                      {
                        "Value": "CPF do Responsável"
                      },
                      {
                        "Value": "Em falta",
                        "Notication State": "DANGER"
                      },
                      {
                        "Value": ""
                      }
                    ]
                  },
                  {
                    "minHeight" : "100 px",
                    "Columns": [
                      {
                        "Value": "Foto 3x4"
                      },
                      {
                        "Value": "Entregar até 29/06/2020",
                        "Notication State": "INFO"
                      },
                      {
                        "Value": "OK",
                        "Notication State": "SUCCESS"
                      }
                    ]
                  },
                  {
                    "minHeight" : "100 px",
                    "Columns": [
                      {
                        "Value": "Histórico escolar do Ensino Fundamental"
                      },
                      {
                        "Value": "OK",
                        "Notication State": "SUCCESS"
                      },
                      {
                        "Value": ""
                      }
                    ]
                  },
                  {
                    "minHeight" : "100 px",
                    "Columns": [
                      {
                        "Value": "Histórico escolar do Ensino Médio"
                      },
                      {
                        "Value": "Atualizar até 29/06/2020",
                        "Notication State": "WARNING"
                      },
                      {
                        "Value": ""
                      }
                    ]
                  }
                ]
              }
            ]
          },
          {
            "id": "4321",
            "header": {
              "style": "card",
              "fields": [
                {
                  "Label": "Nome :",
                  "Value": "second kid name"
                },
                {
                  "Label": "Turma :",
                  "Value": "1 Ano A"
                }
              ]
            },
            "blocks": [
              {
                "Header text": "Documento",
                "barposition": "left",
                "barcolor": "red",
                "Columns": [
                  {
                    "Title": "Documento",
                    "Width": "100 %"
                  },
                  {
                    "Title": "2020",
                    "Width": "100 px"
                  }
                ],
                "Lines": [
                  {
                    "minHeight" : "100 px",
                    "Columns": [
                      {
                        "Value": "CPF do Responsável"
                      },
                      {
                        "Value": "Em falta",
                        "Notication State": "DANGER"
                      }
                    ]
                  },
                  {
                    "minHeight" : "100 px",
                    "Columns": [
                      {
                        "Value": "Foto 3x4"
                      },
                      {
                        "Value": "Entregar até 29/06/2020",
                        "Notication State": "INFO"
                      }
                    ]
                  },
                  {
                    "minHeight" : "100 px",
                    "Columns": [
                      {
                        "Value": "Histórico escolar do Ensino Fundamental"
                      },
                      {
                        "Value": "OK",
                        "Notication State": "SUCCESS"
                      }
                    ]
                  },
                  {
                    "minHeight" : "100 px",
                    "Columns": [
                      {
                        "Value": "Histórico escolar do Ensino Médio"
                      },
                      {
                        "Value": "Atualizar até 29/06/2020",
                        "Notication State": "WARNING"
                      }
                    ]
                  }
                ]
              }
            ]
          }
        ]
      }';

    $res = json_decode($data, true);

    return $res;
}

function iterateIds($json) {
  if ($json["ids"])
  {
    $ids = $json["ids"];
    foreach ($ids as $id) {
      renderId($id);
    }
    echo '</div>';
  }

  return null;
}

function renderId($id) {
  foreach ($id as $key => $val) {
    if ($key === "header") {
      renderHeaderId($val);
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
  iterateFields($heads);
}

function iterateFields($heads) {
  echo '<div class="header">';
  foreach ($heads as $head) {
    echo '<div class="row">';
    $label = $head["Label"];
    $value = $head["Value"];
    renderField($label, $value);
    echo '</div>';
  }
  echo '</div>';
}

function renderField($label, $value) {
  echo '<p class="label">'.$label . '</p>';
  echo '<p class="value">' . $value . '</p>';
}
//<---------- Header --------->//

//<---------- Blocks --------->//
function iterateBlocks($val) {
  $blocks = $val;
  foreach ($blocks as $block) {
    renderBlock($block);
  }
}

function renderBlock($block) {
  echo '<div class="row">';
  $color = $block["barcolor"];
  renderBar($color);
  echo '<div class="col block">';
  $headerText = $block["Header text"];
//        renderHeaderBlock($headerText);
  echo '
  <div class="w3-padding w3-white notranslate">
    <div class="table-responsive">
      <table class="table">
        <thead class="thead-light">
          <tr>';
          $columns = $block["Columns"];
  iterateColumns($columns);
  echo '
  </tr>
  </thead>
  <tbody>';

  $lines = $block["Lines"];
  iterateLines($lines);

    echo '
      </tbody>
      </table>
      </div>
      </div>';

    if (array_key_exists("Trailer", $block)) {
      $trailerContent = $block["Trailer"]["htmlcontent"];
    } else {
      $trailerContent = NULL;
    }

    renderTrailerBlock($trailerContent);
    echo '
      </div>
      </div>';
}

function renderBar($color) {
  echo '<div class="col block-bar" style="background-color: ' . $color . '; border-color: ' . $color . '"></div>';
}

function renderHeaderBlock($headerText) {
  echo '<div class="block-title">' . $headerText . '</div>';
}

function iterateColumns($columns) {
  foreach ($columns as $column) {
    $title = $column["Title"];
    $width = $column["Width"];
    renderColumn($title, $width);
  }
}

function renderColumn($title, $width) {
  $width = str_replace(" ","", $width);
  echo '<th style="width:' . $width . '">' . $title . '</th>';
}

function iterateLines($lines) {
  foreach ($lines as $line) {
    iterateCells($line);
  }
}

function iterateCells($line) {
  $cells = $line["Columns"];
  echo '<tr>';
  foreach ($cells as $cell) {
    if (array_key_exists("Notication State", $cell)) {
    //   $color = $cell["Notication State"];
      $color = $cell["Notication State"];
      $value = $cell["Value"]; 
    } else {
      $color = NULL;
      $value = $cell["Value"]; 
    }
    renderCell($value, $color);
  }
  echo '</tr>';
}
 
function renderCell($value, $color) {
  $value = str_replace(" ","", $value);
  if ($color !== NULL ) {
      if ($color === "SUCCESS") {
        echo '<td><div class="bg-success notify" style="width: 74px; height: 60px; font-color: #ffffff"><div>' . $value . '</div></div></td>';
      }
      if ($color === "DANGER") {
        echo '<td><div class="bg-danger notify" style="width: 74px; height: 60px; font-color: #ffffff"><div>' . $value . '</div></div></td>';
      }
      if ($color === "WARNING") {
        echo '<td><div class="bg-warning notify" style="width: 74px; height: 60px; font-color: #ffffff"><div>' . $value . '</div></div></td>';
      }
      if ($color === "INFO") {
        echo '<td><div class="bg-info notify" style="width: 74px; height: 60px; font-color: #ffffff"><div>' . $value . '</div></div></td>';
      }
    } else {
      echo '<td>' . $value . '</td>';
    }
 }
  
function renderTrailerBlock($trailerContent) {
  if ($trailerContent !== NULL) {
    echo '<div class="trailer">' . $trailerContent . '</div>';
  }
}
//<---------- Blocks --------->//

//<---------- Trailer --------->//
function renderTrailerId($val) {
  echo '
  <div class="footer">
  <h5>'.$val["htmlcontent"].'</h5>
  </div>';
}
//<---------- Trailer --------->//

?>