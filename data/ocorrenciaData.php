<?php
function connect() {

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
          "link": "https:sisalu.com.brjsonjsonocorrencia2.txt"
       }
      }
    ';

    $res = json_decode($data, true);

    return $res;
}
?>