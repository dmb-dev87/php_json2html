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
            "id": "1234",
            "select": {
              "Label": "Aluno :",
              "Default Value": "Student name 1",
              "Values": [
                {
                  "Value": "Student name 1"
                },
                {
                  "Value": "Student name 2"
                }
              ],
              "actions": [
                {
                  "selected value": "Student name 1",
                  "select": {
                    "Label": "Ano letivo :",
                    "Default Value": "2020",
                    "Values": [
                      {
                        "Value": "2019"
                      },
                      {
                        "Value": "2020"
                      }
                    ],
                    "actions": [
                      {
                        "selected value": "2019",
                        "blocks": [
                          {
                            "Header text": "Existem parcelas atrasadas em 2018, 2019 e 2020",
                            "barposition": "left",
                            "barcolor": "orange"
                          },
                          {
                            "Header text": "Mensalidade - Jan / 2019",
                            "barposition": "left",
                            "barcolor": "red",
                            "Columns": [
                              {
                                "Title": "",
                                "Width": "200 px"
                              },
                              {
                                "Title": "",
                                "Width": "100 %"
                              }
                            ],
                            "Lines": [
                              {
                                "Columns": [
                                  {
                                    "Value": "Situação",
                                    "horizontal align": "right"
                                  },
                                  {
                                    "Value": "Pago",
                                    "color": "blue"
                                  }
                                ]
                              },
                              {
                                "Columns": [
                                  {
                                    "Value": "Valor a pagar",
                                    "horizontal align": "right"
                                  },
                                  {
                                    "Value": "R$ 200 até 26/01/2019"
                                  }
                                ]
                              },
                              {
                                "Columns": [
                                  {
                                    "Value": "Valor pago",
                                    "horizontal align": "right"
                                  },
                                  {
                                    "Value": "R$ 200,00 em 25/01/2019"
                                  }
                                ]
                              },
                              {
                                "Columns": [
                                  {
                                    "Value": "Boleto",
                                    "horizontal align": "right"
                                  },
                                  {
                                    "Value": "gerar boleto",
                                    "link": "https:6z49"
                                  }
                                ]
                              },
                              {
                                "Columns": [
                                  {
                                    "Value": "NFE",
                                    "horizontal align": "right"
                                  },
                                  {
                                    "Value": "abrir nfe",
                                    "link": "https:J6z49"
                                  }
                                ]
                              }
                            ]
                          }
                        ]
                      },
                      {
                        "selected value": "2020",
                        "blocks": [
                          {
                            "Header text": "Existem parcelas atrasadas em 2018, 2019 e 2020",
                            "barposition": "left",
                            "barcolor": "orange"
                          },
                          {
                            "Header text": "Existem parcelas para a rematrícula de 2020",
                            "barposition": "left",
                            "barcolor": "orange"
                          },
                          {
                            "Header text": "Matrícula - Out / 2020",
                            "barposition": "left",
                            "barcolor": "blue",
                            "Columns": [
                              {
                                "Title": "",
                                "Width": "200 px"
                              },
                              {
                                "Title": "",
                                "Width": "100 %"
                              }
                            ],
                            "Lines": [
                              {
                                "Columns": [
                                  {
                                    "Value": "Situação",
                                    "horizontal align": "right"
                                  },
                                  {
                                    "Value": "A Pagar",
                                    "color": "blue"
                                  }
                                ]
                              },
                              {
                                "Columns": [
                                  {
                                    "Value": "Valor Bruto",
                                    "horizontal align": "right"
                                  },
                                  {
                                    "Value": "R$ 300,00 em 26/10/2020"
                                  }
                                ]
                              },
                              {
                                "Columns": [
                                  {
                                    "Value": "Valor pago",
                                    "horizontal align": "right"
                                  },
                                  {
                                    "Value": "-"
                                  }
                                ]
                              },
                              {
                                "Columns": [
                                  {
                                    "Value": "Boleto",
                                    "horizontal align": "right"
                                  },
                                  {
                                    "Value": "gerar boleto",
                                    "link": "https:thisisalink.to.be.open.in.a.new.windows.com"
                                  }
                                ]
                              },
                              {
                                "Columns": [
                                  {
                                    "Value": "NFE",
                                    "horizontal align": "right"
                                  },
                                  {
                                    "Value": "abrir nfe",
                                    "link": "https:sisalu.com.brJ6z49"
                                  }
                                ]
                              }
                            ]
                          },
                          {
                            "Header text": "Mensalidade - Jan / 2020",
                            "barposition": "left",
                            "barcolor": "blue",
                            "Columns": [
                              {
                                "Title": "",
                                "Width": "200 px"
                              },
                              {
                                "Title": "",
                                "Width": "100 %"
                              }
                            ],
                            "Lines": [
                              {
                                "Columns": [
                                  {
                                    "Value": "Situação",
                                    "horizontal align": "right"
                                  },
                                  {
                                    "Value": "Atrasado",
                                    "color": "red"
                                  }
                                ]
                              },
                              {
                                "Columns": [
                                  {
                                    "Value": "Valor Bruto",
                                    "horizontal align": "right"
                                  },
                                  {
                                    "Value": "R$ 158,98 em 26/01/2020"
                                  }
                                ]
                              },
                              {
                                "Columns": [
                                  {
                                    "Value": "Desconto",
                                    "horizontal align": "right"
                                  },
                                  {
                                    "Value": "R$ 10 até 26/01/2020"
                                  }
                                ]
                              },
                              {
                                "Columns": [
                                  {
                                    "Value": "Valor a pagar",
                                    "horizontal align": "right"
                                  },
                                  {
                                    "Value": "R$ 148,98 até 26/01/2020"
                                  }
                                ]
                              },
                              {
                                "Columns": [
                                  {
                                    "Value": "Valor pago",
                                    "horizontal align": "right"
                                  },
                                  {
                                    "Value": "-"
                                  }
                                ]
                              },
                              {
                                "Columns": [
                                  {
                                    "Value": "Boleto",
                                    "horizontal align": "right"
                                  },
                                  {
                                    "Value": "gerar boleto",
                                    "link": "https:thisisalink.to.be.open.in.a.new.windows.com"
                                  }
                                ]
                              },
                              {
                                "Columns": [
                                  {
                                    "Value": "NFE",
                                    "horizontal align": "right"
                                  },
                                  {
                                    "Value": "abrir nfe",
                                    "link": "httpsthisisalink.to.be.open.in.a.new.windows.com"
                                  }
                                ]
                              }
                            ]
                          }
                        ]
                      }
                    ]
                  }
                },
                {
                  "selected value": "Student name 2",
                  "select": {
                    "Label": "Ano letivo :",
                    "Default Value": "2020",
                    "Values": [
                      {
                        "Value": "2020"
                      }
                    ],
                    "actions": [
                      {
                        "selected value": "2020",
                        "blocks": [
                          {
                            "Header text": "Mensalidade - Jan / 2019",
                            "barposition": "left",
                            "barcolor": "red",
                            "Columns": [
                              {
                                "Title": "",
                                "Width": "200 px"
                              },
                              {
                                "Title": "",
                                "Width": "100 %"
                              }
                            ],
                            "Lines": [
                              {
                                "Columns": [
                                  {
                                    "Value": "Situação",
                                    "horizontal align": "right"
                                  },
                                  {
                                    "Value": "Pago",
                                    "color": "blue"
                                  }
                                ]
                              },
                              {
                                "Columns": [
                                  {
                                    "Value": "Valor a pagar",
                                    "horizontal align": "right"
                                  },
                                  {
                                    "Value": "R$ 200 até 26/01/2019"
                                  }
                                ]
                              },
                              {
                                "Columns": [
                                  {
                                    "Value": "Valor pago",
                                    "horizontal align": "right"
                                  },
                                  {
                                    "Value": "R$ 200,00 em 25/01/2019"
                                  }
                                ]
                              },
                              {
                                "Columns": [
                                  {
                                    "Value": "Boleto",
                                    "horizontal align": "right"
                                  },
                                  {
                                    "Value": "gerar boleto",
                                    "link": "https:thisisalink.to.be.open.in.a.new.windows.com"
                                  }
                                ]
                              },
                              {
                                "Columns": [
                                  {
                                    "Value": "NFE",
                                    "horizontal align": "right"
                                  },
                                  {
                                    "Value": "abrir nfe",
                                    "link": "https:thisisalink.to.be.open.in.a.new.windows.com"
                                  }
                                ]
                              }
                            ]
                          }
                        ]
                      }
                    ]
                  }
                }
              ]
            }
          }
        ]
      }
    ';

    $res = json_decode($data, true);

    return $res;
}
?>