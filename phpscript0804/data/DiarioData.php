<?php
function connect() {

    $data = '
    {
        "ids": [
          {
            "id": "1234",
            "header": {
              "style": "card",
              "fields": [
                {
                  "Label": "26/06/2020 - here goes kid name"
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
                  "Label": "26/06/2020 - here goes kid name"
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
          "link": "DiarioTest2.php"}
      }
    ';

    $res = json_decode($data, true);

    return $res;
}
?>