<?php
function connect() {

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
      "id": "3",
      "header": {
        "style": "card",
        "fields": [
          {
            "Label": "Nome :",
            "Value": "here goes kid name 3"
          },
          {
            "Label": "Data :",
            "Value": "20/06/2020 15:30"
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
                  "Value": "Loaded from button\\nWith many lines\\nfasd\\nfadsf\\nfsad\\nfasdfasdfafasdfa"
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
      "id": "4",
      "header": {
        "style": "card",
        "fields": [
          {
            "Label": "Nome :",
            "Value": "here goes kid name"
          },
          {
            "Label": "Data :",
            "Value": "20/06/2020 15:30"
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
  ]
}
    ';

    $res = json_decode($data, true);

    return $res;
}
?>