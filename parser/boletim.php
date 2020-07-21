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
              "Header text": "1 Bimestre",
              "barposition": "left",
              "_comment_barposition": "could be left, right or none",
              "barcolor": "red",
              "Columns": [
                {
                  "Title": "Matéria",
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
                      "Value": "Matemática"
                    },
                    {
                      "Value": "3,0",
                      "color": "red"
                    },
                    {
                      "Value": "4"
                    }
                  ]
                },
                {
                  "Columns": [
                    {
                      "Value": "Português"
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
              "Trailer": {
                "htmlcontent": "some optional value"
              }
            },
            {
              "Header text": "2 Bimestre",
              "barposition": "left",
              "barcolor": "blue",
              "Columns": [
                {
                  "Title": "Matéria",
                  "Width": "100%"
                },
                {
                  "Title": "Nota",
                  "Width": "100px"
                },
                {
                  "Title": "Falta",
                  "Width": "100px"
                }
              ],
              "Lines": [
                {
                  "Columns": [
                    {
                      "Value": "Matemática",
                      "color": "blue"
                    },
                    {
                      "Value": "9,5",
                      "color": "blue"
                    },
                    {
                      "Value": "1",
                      "color": "red"
                    }
                  ]
                },
                {
                  "Columns": [
                    {
                      "Value": "Português"
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
              "Trailer": {
                "htmlcontent": "the trailer can be omited"
              }
            },
            {
              "Header text": "Finais",
              "barposition": "left",
              "barcolor": "blue",
              "Columns": [
                {
                  "Title": "Matéria",
                  "Width": "100%"
                },
                {
                  "Title": "Nota",
                  "Width": "150px"
                },
                {
                  "Title": "Falta",
                  "Width": "150px"
                },
                {
                  "Title": "Freq",
                  "Width": "150px"
                }
              ],
              "Lines": [
                {
                  "Columns": [
                    {
                      "Value": "Matemática"
                    },
                    {
                      "Value": "8,7",
                      "color": "blue"
                    },
                    {
                      "Value": "5"
                    },
                    {
                      "Value": "90 %"
                    }
                  ]
                },
                {
                  "Columns": [
                    {
                      "Value": "Português"
                    },
                    {
                      "Value": "6,0",
                      "color": "blue"
                    },
                    {
                      "Value": "6"
                    },
                    {
                      "Value": "87 %"
                    }
                  ]
                }
              ]
            }
          ],
          "trailer": {
            "htmlcontent": " just a sample "
          }
        },
        {
          "id": "4321",
          "header": {
            "fields": [
              {
                "Label": "Nome :",
                "Value": "Second kid name"
              },
              {
                "Label": "Turma :",
                "Value": "2 Ano A"
              }
            ]
          },
          "blocks": [
            {
              "Header text": "1 Bimestre",
              "barposition": "left",
              "_comment_barposition": "could be left, right or none",
              "barcolor": "red",
              "Columns": [
                {
                  "Title": "Matéria",
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
                      "Value": "Matemática"
                    },
                    {
                      "Value": "3,0",
                      "color": "red"
                    },
                    {
                      "Value": "4"
                    }
                  ]
                },
                {
                  "Columns": [
                    {
                      "Value": "Português"
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
              "Trailer": {
                "htmlcontent": "some optional value"
              }
            },
            {
              "Header text": "2 Bimestre",
              "barposition": "left",
              "barcolor": "blue",
              "Columns": [
                {
                  "Title": "Matéria",
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
                      "Value": "Matemática",
                      "color": "blue"
                    },
                    {
                      "Value": "9,5",
                      "color": "blue"
                    },
                    {
                      "Value": "1",
                      "color": "red"
                    }
                  ]
                },
                {
                  "Columns": [
                    {
                      "Value": "Português"
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
              "Trailer": {
                "htmlcontent": "the trailer can be omited"
              }
            },
            {
              "Header text": "Finais",
              "barposition": "left",
              "barcolor": "blue",
              "Columns": [
                {
                  "Title": "Matéria",
                  "Width": "100 %"
                },
                {
                  "Title": "Nota",
                  "Width": "100 px"
                },
                {
                  "Title": "Falta",
                  "Width": "100 px"
                },
                {
                  "Title": "Freq",
                  "Width": "100 px"
                }
              ],
              "Lines": [
                {
                  "Columns": [
                    {
                      "Value": "Matemática"
                    },
                    {
                      "Value": "8,7",
                      "color": "blue"
                    },
                    {
                      "Value": "5"
                    },
                    {
                      "Value": "90 %"
                    }
                  ]
                },
                {
                  "Columns": [
                    {
                      "Value": "Português"
                    },
                    {
                      "Value": "6,0",
                      "color": "blue"
                    },
                    {
                      "Value": "6"
                    },
                    {
                      "Value": "87 %"
                    }
                  ]
                }
              ]
            }
          ],
          "trailer": {
            "htmlcontent": "<b> just a sample </b>"
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