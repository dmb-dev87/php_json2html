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
            "id": "1234",
            "header": {
              "style": "card",
              "fields": [
                {
                  "Label": "25/06/2020 - here goes kid name"
                }
              ]
            },
            "blocks": [
              {
                "barposition": "left",
                "barcolor": "red",
                "Columns": [
                  {
                    "Title": "Matemática",
                    "Width": "100 %"
                  }
                ],
                "Lines": [
                  {
                    "Columns": [
                      {
                        "Value": "Big text with many nay worda fasdfasd \\nfasdfasd\\nfasd\\nfasdf\\nasdfasd\\nfadsfasdfadf\\nfasdfasdfasdf\\n\\nfa\\nsdfasd"
                      }
                    ]
                  },
                  {
                    "Columns": [
                      {
                        "Value": "Ausente"
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
                    "Title": "Biologia",
                    "Width": "100 %"
                  }
                ],
                "Lines": [
                  {
                    "Columns": [
                      {
                        "Value": "The text could also be short as just 1 line"
                      }
                    ]
                  },
                  {
                    "Columns": [
                      {
                        "Value": "Presente"
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
                  "Label": "25/06/2020 - here goes kid name"
                }
              ]
            },
            "blocks": [
              {
                "barposition": "left",
                "barcolor": "orange",
                "Columns": [
                  {
                    "Title": "Matemática",
                    "Width": "100 %"
                  }
                ],
                "Lines": [
                  {
                    "Columns": [
                      {
                        "Value": "Some new content \\nwith just 2 lines"
                      }
                    ]
                  },
                  {
                    "Columns": [
                      {
                        "Value": "Ausente / Presente"
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
            "link": "httpsjsondiariolast.txt"}
}';


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
        $label = $head["Label"];
        renderField($label);
    }
    echo '</div>';
}

function renderField($label)
{
    echo '<p class="label">' . $label . '</p>';
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