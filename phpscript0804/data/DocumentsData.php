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
                    "Width": "40 %"
                  },
                  {
                    "Title": "2020",
                    "Width": "300 px"
                  },
                  {
                    "Title": "2019",
                    "Width": "300 px"
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
                        "Notification State": "DANGER"
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
                        "Notification State": "INFO"
                      },
                      {
                        "Value": "OK",
                        "Notification State": "SUCCESS"
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
                        "Notification State": "SUCCESS"
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
                        "Notification State": "WARNING"
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
                    "Width": "40 %"
                  },
                  {
                    "Title": "2020",
                    "Width": "300 px"
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
                        "Notification State": "DANGER"
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
                        "Notification State": "INFO"
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
                        "Notification State": "SUCCESS"
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
                        "Notification State": "WARNING"
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