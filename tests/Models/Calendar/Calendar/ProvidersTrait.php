<?php

namespace Tests\Models\Calendar\Calendar;

trait ProvidersTrait
{
    public function allWeekdays()
    {
        return [
            'Date is Sunday' => [
                [
                    'date' => [
                        'format' => 'Y-m-d',
                        'date' => '2021-10-10'
                    ],
                    'results' => [
                        'class' => 'App\Models\WeekdayStrategy\Sunday',
                        'day' => 'domingo'
                    ]
                ]
            ],
            'Date is Monday' => [
                [
                    'date' => [
                        'format' => 'Y-m-d',
                        'date' => '2021-10-11'
                    ],
                    'results' => [
                        'class' => 'App\Models\WeekdayStrategy\Monday',
                        'day' => 'segunda-feira'
                    ]
                ]
            ],
            'Date is Tuesday' => [
                [
                    'date' => [
                        'format' => 'Y-m-d',
                        'date' => '2021-10-12'
                    ],
                    'results' => [
                        'class' => 'App\Models\WeekdayStrategy\Tuesday',
                        'day' => 'terça-feira'
                    ]
                ]
            ],
            'Date is Wednesday' => [
                [
                    'date' => [
                        'format' => 'Y-m-d',
                        'date' => '2021-10-13'
                    ],
                    'results' => [
                        'class' => 'App\Models\WeekdayStrategy\Wednesday',
                        'day' => 'quarta-feira'
                    ]
                ]
            ],
            'Date is Thursday' => [
                [
                    'date' => [
                        'format' => 'Y-m-d',
                        'date' => '2021-10-14'
                    ],
                    'results' => [
                        'class' => 'App\Models\WeekdayStrategy\Thursday',
                        'day' => 'quinta-feira'
                    ]
                ]
            ],
            'Date is Friday' => [
                [
                    'date' => [
                        'format' => 'Y-m-d',
                        'date' => '2021-10-15'
                    ],
                    'results' => [
                        'class' => 'App\Models\WeekdayStrategy\Friday',
                        'day' => 'sexta-feira'
                    ]
                ]
            ],
            'Date is Saturday' => [
                [
                    'date' => [
                        'format' => 'Y-m-d',
                        'date' => '2021-10-16'
                    ],
                    'results' => [
                        'class' => 'App\Models\WeekdayStrategy\Saturday',
                        'day' => 'sábado'
                    ]
                ]
            ],

        ];
    }

    public function withSpecialDates()
    {
        return [
            'No special dates added' => [
                [
                    'date' => '2021-12-25',
                    'date_format' => 'Y-m-d',
                    'special_dates' => null,
                    'results' => [
                        'class' => 'App\Models\WeekdayStrategy\Saturday',
                        'day' => 'sábado',
                        'special_messages' => null
                    ]
                ]
            ],
            'Has special date and is not the special day' => [
                [
                    'date' => '2021-12-24',
                    'date_format' => 'Y-m-d',
                    'special_dates' => [
                        [
                            'date' => '2021-12-25',
                            'message' => 'Feliz Natal!'
                        ]
                    ],
                    'results' => [
                        'class' => 'App\Models\WeekdayStrategy\Friday',
                        'day' => 'sexta-feira',
                        'special_messages' => null
                    ]
                ]
            ],
            'Has special date and is the special day' => [
                [
                    'date' => '2021-12-25',
                    'date_format' => 'Y-m-d',
                    'special_dates' => [
                        [
                            'date' => '2021-12-25',
                            'message' => 'Feliz Natal!'
                        ]
                    ],
                    'results' => [
                        'class' => 'App\Models\WeekdayStrategy\Saturday',
                        'day' => 'sábado',
                        'special_messages' => [
                            'Feliz Natal!',
                        ]
                    ]
                ]
            ],
            'Has many special dates and is not the special day' => [
                [
                    'date' => '2021-10-25',
                    'date_format' => 'Y-m-d',
                    'special_dates' => [
                        [
                            'date' => '2021-12-25',
                            'message' => 'Feliz Natal!'
                        ],
                        [
                            'date' => '2022-01-01',
                            'message' => 'Feliz Ano Novo!'
                        ],
                        [
                            'date' => '2021-10-12',
                            'message' => 'Feliz dia das crianças!'
                        ]
                    ],
                    'results' => [
                        'class' => 'App\Models\WeekdayStrategy\Monday',
                        'day' => 'segunda-feira',
                        'special_messages' => null,
                    ]
                ]
            ],
            'Has many special dates and is the special day' => [
                [
                    'date' => '2021-12-25',
                    'date_format' => 'Y-m-d',
                    'special_dates' => [
                        [
                            'date' => '2021-12-25',
                            'message' => 'Feliz Natal!'
                        ],
                        [
                            'date' => '2022-01-01',
                            'message' => 'Feliz Ano Novo!'
                        ],
                        [
                            'date' => '2021-10-12',
                            'message' => 'Feliz dia das crianças!'
                        ]
                    ],
                    'results' => [
                        'class' => 'App\Models\WeekdayStrategy\Saturday',
                        'day' => 'sábado',
                        'special_messages' => [
                            'Feliz Natal!',
                        ]
                    ]
                ]
            ],
            'Has many special dates and is the special day with 2 special dates in same day' => [
                [
                    'date' => '2022-06-24',
                    'date_format' => 'Y-m-d',
                    'special_dates' => [
                        [
                            'date' => '2021-12-25',
                            'message' => 'Feliz Natal!'
                        ],
                        [
                            'date' => '2022-01-01',
                            'message' => 'Feliz Ano Novo!'
                        ],
                        [
                            'date' => '2021-10-12',
                            'message' => 'Feliz dia das crianças!'
                        ],
                        [
                            'date' => '2022-06-24',
                            'message' => 'Feliz dia de São João!'
                        ],
                        [
                            'date' => '2022-06-24',
                            'message' => 'Aniversário de minha namorada!'
                        ],
                    ],
                    'results' => [
                        'class' => 'App\Models\WeekdayStrategy\Friday',
                        'day' => 'sexta-feira',
                        'special_messages' => [
                            'Feliz dia de São João!',
                            'Aniversário de minha namorada!'
                        ]
                    ]
                ]
            ],
        ];
    }
}
