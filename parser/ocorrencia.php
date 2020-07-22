<?php

function displayDiarioPage()
{
    $res = connect();

    if ($res === NULL) {
        return 0;
    }
    echo '<div class="container">';
    iterateIds($res);
}

function connect()
{
    /*
    * Add API URL here
    */
    //  $url = "http://jsonurlXXXXX"; 
    //  $data = file_get_contents($url);

    // test json data
    $data = '
    {
        "ids": [
          {
            "id": "1",
            "header": {
              "style": "card",
              "fields": [
                {
                  "Label": "Nome :",
                  "Value": "here goes kid name"
                },
                {
                  "Label": "Data :",
                  "Value": "26/06/2020 15:30"
                },
                {
                  "Label": "Matéria :",
                  "Value": "Português"
                },
                {
                  "Label": "Professor :",
                  "Value": "Fulano de tal"
                }
              ]
            },
            "blocks": [
              {
                "barposition": "left",
                "barcolor": "red",
                "Columns": [
                  {
                    "Title": "Ocorrência",
                    "Width": "100 %"
                  }
                ],
                "Lines": [
                  {
                    "Columns": [
                      {
                        "Value": "Here we can have very big text\\nWith many lines\\nfasd\\nfadsf\\nfsad\\nfasdfasdfafasdfa"
                      }
                    ]
                  }
                ]
              },
              {
                "barposition": "left",
                "barcolor": "green",
                "Columns": [
                  {
                    "Title": "Solução",
                    "Width": "100 %"
                  }
                ],
                "Lines": [
                  {
                    "Columns": [
                      {
                        "Value": "Here we can have very big text too\\nWith many lines, or just a few ones"
                      }
                    ]
                  }
                ]
              }
            ]
          },
          {
            "id": "2",
            "header": {
              "style": "card",
              "fields": [
                {
                  "Label": "Nome :",
                  "Value": "here goes kid name"
                },
                {
                  "Label": "Data :",
                  "Value": "26/06/2020 15:30"
                },
                {
                  "Label": "Matéria : ",
                  "Value": "Português"
                },
                {
                  "Label": "Professor :",
                  "Value": "Fulano de tal"
                }
              ]
            },
            "blocks": [
              {
                "barposition": "left",
                "barcolor": "red",
                "Columns": [
                  {
                    "Title": "Ocorrência",
                    "Width": "100 %"
                  }
                ],
                "Lines": [
                  {
                    "Columns": [
                      {
                        "Value": "Here we can have very big text"
                      }
                    ]
                  }
                ]
              },
              {
                "barposition": "left",
                "barcolor": "blue",
                "Columns": [
                  {
                    "Title": "Solução",
                    "Width": "100 %"
                  }
                ],
                "Lines": [
                  {
                    "Columns": [
                      {
                        "Value": "Here we can have very big text too\\nWith many lines, or just a few ones"
                      }
                    ]
                  }
                ]
              }
            ]
          }
        ],
        "DownloadMoreData": {
          "Caption": "LOAD MORE DATA",
          "link": "httpstxt"
       }
      }
    ';


    $res = json_decode($data, true);

    return $res;
}

function iterateIds($json)
{
    foreach ($json as $key => $val) {
        if ($key === "ids") {
            $ids = $val;
            foreach ($ids as $id) {
                renderId($id);
            }
            echo '</div>';
        }
        
        if ($key === "DownloadMoreData") {
            renderLoadTag($val);
            echo '</div>';
        }
    }

    return null;
}


function renderId($id)
{
    foreach ($id as $key => $val) {
        if ($key === "header") {
            renderHeaderId($val);
        }
        if ($key === "blocks") {
            iterateBlocks($val);
        }
    }
}

//<---------- Header --------->//
function renderHeaderId($val)
{
    $style = $val["style"];
    $heads = $val["fields"];
    iterateFields($heads, $style);
}

function iterateFields($heads, $style)
{
    echo '<div class="' . $style . '">';
    foreach ($heads as $head) {
        echo '<div class="row">';
        $label = $head["Label"];
        $value = $head["Value"];
        renderField($label, $value);
        echo '</div>';
    }
    echo '</div>';
}

function renderField($label, $value)
{
    echo '<p class="label">' . $label . '</p>';
    echo '<p class="value">' . $value . '</p>';
}
//<---------- Header --------->//

//<---------- Blocks --------->//
function iterateBlocks($val)
{
    $blocks = $val;
    foreach ($blocks as $block) {
        renderBlock($block);
    }
}

function renderBlock($block)
{
    echo '<div class="row">';
    $color = $block["barcolor"];
    renderBar($color);
    echo '<div class="col block">';
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

        echo '
        </div>
        </div>';
    }
    
    function renderBar($color)
    {
        echo '<div class="col block-bar" style="background-color: ' . $color . '; border-color: ' . $color . '"></div>';
}

function renderHeaderBlock($headerText)
{
    echo '<div class="block-title">' . $headerText . '</div>';
}

function iterateColumns($columns)
{
    foreach ($columns as $column) {
        $title = $column["Title"];
        $width = $column["Width"];
        renderColumn($title, $width);
    }
}

function renderColumn($title, $width)
{
    $width = str_replace(" ", "", $width);
    echo '<th style="width:' . $width . '">' . $title . '</th>';
}

function iterateLines($lines)
{
    foreach ($lines as $line) {
        iterateCells($line);
    }
}

function iterateCells($line)
{
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
        
        renderCell(nl2br($value), $color);
    }
    echo '</tr>';
}

function renderCell($value, $color)
{
    if ($color !== NULL) {
        echo '<td style="color:' . $color . '">' . $value . '</td>';
    } else {
        echo '<td>' . $value . '</td>';
    }
}
//<---------- Blocks --------->//

function renderLoadTag($val) {
    echo '<div class="link-tag">
    <p>'.$val["Caption"].'</p>
    <div>';

}
?>