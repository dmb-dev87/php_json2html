<?php

function displayDetalPage() {
  $res = connectDetal();

  if ($res === NULL)
    return 0;
  echo '<div class="container">';

  iterateIds($res);

  echo '<script>
  function OnSelectionChange() {
    if(isset($_GET["period"])){
      $period=$_GET["period"];
      echo "select country is => ".$period;
  }
  }
  </script>';
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
                            "Falta": "1"
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
                  "htmlcontent": "<b> just a sample <\b>"
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
                            "Falta": "1"
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
                  "htmlcontent": "<b> just a diferent sample <\b>"
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
    // if ($key === "blocks") {
    //   iterateBlocks($val);
    // }
    // if ($key === "trailer") {
    //   renderTrailerId($val);
    // }
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
    $label = $head["Label"];
    $value = $head["Value"];
    renderField($label, $value);
  }
  echo '</div>';
}

function renderField($label, $value) {
  echo '<p><b>' . $label . '</b>&nbsp;&nbsp;&nbsp;' . $value . '</p>';
}
//<---------- Header --------->//

//<---------- Select --------->//
function renderSelectId($val) {
  $elements = $val;
  foreach ($elements as $key => $val) {
    if ($key === "Label") {
      echo '<label>'.$val.':</label>';
    }

    if ($key === "Values") {
      $options = $val;
      echo '<select name="period" onchange="OnSelectionChange(value)">';
      foreach ($options as $option) {
        foreach ($option as $optkey => $optval) {
          echo '<option value="'.$optval.'">'.$optval.'</option>';
        }
      }

      echo '</select>';
    }

  }

}

function showlog() {
  echo '22222';
}

//<---------- Select --------->//
?>
<script> function OnSelectionChange(value) {
   
   console.log( 'AAAAAAAAAAAAAA' + value);
   alert("<?php showlog(); ?>");
  }
 </script>