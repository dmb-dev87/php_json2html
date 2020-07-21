<?php

function displayDetalPage() {
  $res = connectDetal();

  if ($res === NULL)
    return 0;
  echo '<div class="container">';

  iterateIds($res);
  // echo '<script>
  // function OnSelectionChange() {
  //   if(isset($_GET["period"])){
  //     $period=$_GET["period"];
  //     echo "select country is => ".$period;
  // }
  // }
  // </script>';
}

function connectDetal() {

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
          "select": {
            "Label": "Período",
            "Default Value": "1º Bimestre",
            "Values": [
              {
                "Value": "1º Bimestre"
              },
              {
                "Value": "2º Bimestre"
              },
              {
                "Value": "Notas Finais"
              }
            ],
            "Actions": [
              {
                "selected value": "1º Bimestre",
                "blocks": [
                  {
                    "Header text": "Matemática",
                    "barposition": "left",
                    "_comment_barposition : ": "Could be left, right, none",
                    "barcolor": "red",
                    "Columns": [
                      {
                        "Title": "Avaliação",
                        "Width": "100 %"
                      },
                      {
                        "Title": "Nota",
                        "Width": "100 px"
                      },
                      {
                        "Title": "Falta",
                        "Width": "100 px"
                      }
                    ],
                    "Lines": [
                      {
                        "Columns": [
                          {
                            "Value": "Nota 1"
                          },
                          {
                            "Value": "3,0",
                            "color": "red"
                          },
                          {
                            "Value": "-"
                          }
                        ]
                      },
                      {
                        "Columns": [
                          {
                            "Value": "Nota 2"
                          },
                          {
                            "Value": "6,0",
                            "color": "blue"
                          },
                          {
                            "Value": "-"
                          }
                        ]
                      },
                      {
                        "Columns": [
                          {
                            "Value": "Nota 3"
                          },
                          {
                            "Value": "4,0",
                            "color": "red"
                          },
                          {
                            "Value": "4"
                          }
                        ]
                      }
                    ]
                  },
                  {
                    "Header text": "Português",
                    "barposition": "left",
                    "barcolor": "blue",
                    "Columns": [
                      {
                        "Title": "Avaliação",
                        "Width": "100 %"
                      },
                      {
                        "Title": "Nota",
                        "Width": "100 px"
                      },
                      {
                        "Title": "Falta",
                        "Width": "100 px"
                      }
                    ],
                    "Lines": [
                      {
                        "Columns": [
                          {
                            "Value": "Nota 1"
                          },
                          {
                            "Value": "9,5",
                            "color": "blue"
                          },
                          {
                            "Value": "1"
                          }
                        ]
                      },
                      {
                        "Columns": [
                          {
                            "Value": "Nota 2"
                          },
                          {
                            "Value": "6,0",
                            "color": "blue"
                          },
                          {
                            "Value": "3"
                          }
                        ]
                      }
                    ]
                  },
                  {
                    "Header text": "Biologia",
                    "barposition": "left",
                    "barcolor": "blue",
                    "Columns": [
                      {
                        "Title": "Avaliação",
                        "Width": "100 %"
                      },
                      {
                        "Title": "Nota",
                        "Width": "100 px"
                      },
                      {
                        "Title": "Falta",
                        "Width": "100 px"
                      }
                    ],
                    "Lines": [
                      {
                        "Columns": [
                          {
                            "Value": "Nota 1"
                          },
                          {
                            "Value": "9,5",
                            "color": "blue"
                          },
                          {
                            "Value": "1"
                          }
                        ]
                      },
                      {
                        "Columns": [
                          {
                            "Value": "Nota 2"
                          },
                          {
                            "Value": "6,0",
                            "color": "blue"
                          },
                          {
                            "Value": "3"
                          }
                        ]
                      }
                    ],
                    "trailer": {
                      "htmlcontent": "Last trailer"
                    }
                  }
                ],
                "trailer": {
                  "htmlcontent": "<b> just a sample </b>"
                }
              },
              {
                "selected value": "2º Bimestre",
                "blocks": [
                  {
                    "Header text": "Matemática",
                    "barposition": "left",
                    "_comment_barposition : ": "Could be left, right, none",
                    "barcolor": "blue",
                    "Columns": [
                      {
                        "Title": "Avaliação",
                        "Width": "100 %"
                      },
                      {
                        "Title": "Nota",
                        "Width": "100 px"
                      },
                      {
                        "Title": "Falta",
                        "Width": "100 px"
                      }
                    ],
                    "Lines": [
                      {
                        "Columns": [
                          {
                            "Value": "Nota 1"
                          },
                          {
                            "Value": "8,0",
                            "color": "blue"
                          },
                          {
                            "Value": "-"
                          }
                        ]
                      },
                      {
                        "Columns": [
                          {
                            "Value": "Nota 2"
                          },
                          {
                            "Value": "7,0",
                            "color": "blue"
                          },
                          {
                            "Value": "-"
                          }
                        ]
                      },
                      {
                        "Columns": [
                          {
                            "Value": "Nota 3"
                          },
                          {
                            "Value": "8,0",
                            "color": "blue"
                          },
                          {
                            "Value": "4"
                          }
                        ]
                      }
                    ]
                  },
                  {
                    "Header text": "Português",
                    "barposition": "left",
                    "barcolor": "blue",
                    "Columns": [
                      {
                        "Title": "Avalia",
                        "Width": "100 %"
                      },
                      {
                        "Title": "Nota",
                        "Width": "100 px"
                      },
                      {
                        "Title": "Falta",
                        "Width": "100 px"
                      }
                    ],
                    "Lines": [
                      {
                        "Columns": [
                          {
                            "Value": "Nota 1"
                          },
                          {
                            "Value": "7",
                            "color": "blue"
                          },
                          {
                            "Value": "1"
                          }
                        ]
                      },
                      {
                        "Columns": [
                          {
                            "Value": "Nota 2"
                          },
                          {
                            "Value": "8,0",
                            "color": "blue"
                          },
                          {
                            "Value": "4"
                          }
                        ]
                      }
                    ]
                  },
                  {
                    "Header text": "Biologia",
                    "barposition": "left",
                    "barcolor": "red",
                    "Columns": [
                      {
                        "Title": "Avaliação",
                        "Width": "100 %"
                      },
                      {
                        "Title": "Nota",
                        "Width": "100 px"
                      },
                      {
                        "Title": "Falta",
                        "Width": "100 px"
                      }
                    ],
                    "Lines": [
                      {
                        "Columns": [
                          {
                            "Value": "Nota 1"
                          },
                          {
                            "Value": "4,0",
                            "color": "red"
                          },
                          {
                            "Value": "1"
                          }
                        ]
                      },
                      {
                        "Columns": [
                          {
                            "Value": "Nota 2"
                          },
                          {
                            "Value": "6,0",
                            "color": "blue"
                          },
                          {
                            "Value": "3"
                          }
                        ]
                      }
                    ],
                    "trailer": {
                      "htmlcontent": "Last trailer 2 Bimestre"
                    }
                  }
                ],
                "trailer": {
                  "htmlcontent": "<b> just a diferent sample </b>"
                }
              }
            ]
          }
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
    if ($key === "select") {
      renderSelectId($val);
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

//<---------- Select --------->//
function renderSelectId($val) {
  $elements = $val;
  echo '<div class="row selector">';
  foreach ($elements as $key => $val) {
    if ($key === "Label") {
      echo '<p class="label">'.$val.':</p>';
    }

    if ($key === "Default Value") {
      $default_value = str_replace(" ", "", $val);
    }

    if ($key === "Values") {
      $options = $val;
      echo '<select id="period">';
      foreach ($options as $option) {
        foreach ($option as $optkey => $optval) {
          $selected = $default_value===$optval?' selected':' ';
          echo '<option value="'.str_replace(" ", "", $optval). '" ' . $selected.'>'.$optval.'</option>';
        }
      }
      echo '</select></div>';
    }

    if ($key === "Actions") {
      $actions = $val;
      foreach($actions as $action) {
        renderAction($action);
      }
    }
  }
}

function renderAction($action) {
  $elements = $action;

  foreach($elements as $key => $val) {
    if ($key === "selected value") {
      $id_value = str_replace(" ", "", $val);
      echo '<div class="action col" id="' . str_replace(" ", "", $val) . '">';
    }
    if ($key === "blocks") {
      iterateBlocks($val);  
    }
    if ($key === "trailer") {
      renderTrailerId($val);  
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
  echo '<div class="row">';
  $color = $block["barcolor"];
  renderBar($color);
  echo '<div class="col block">';
  $headerText = $block["Header text"];
  renderHeaderBlock($headerText);
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

    if (array_key_exists("trailer", $block)) {
      $trailerContent = $block["trailer"]["htmlcontent"];
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
    if (array_key_exists("color", $cell)) {
      $color = $cell["color"];
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
      echo '<td style="color:' . $color . '">' . $value . '</td>';
    } else {
      echo '<td>' . $value . '</td>';
    }
 }
  
function renderTrailerBlock($trailerContent) {
  if ($trailerContent !== NULL) {
    echo '<div class="trailer">' . $trailerContent . '</div>';
  }
}

function renderTrailerId($val) {
  echo '
  <div class="footer">
  <h5>'.$val["htmlcontent"].'</h5>
  </div>';
}

?>
