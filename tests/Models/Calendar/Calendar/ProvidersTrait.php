<?php

namespace Tests\Models\Calendar\Calendar;

trait ProvidersTrait
{
    public function allWeekdays(): array
    {
        return [
            'Is Sunday' => [
                [
                    'date_format' => 'Y-m-d',
                    'date' => '2021-10-10',
                    'special_dates' => null,
                    'results' => [
                        'weekday_class' => 'App\Models\WeekdayStrategy\Sunday',
                        'day' => 'domingo'
                    ]
                ]
            ],
            'Is Monday' => [
                [
                    'date_format' => 'Y-m-d',
                    'date' => '2021-10-11',
                    'special_dates' => null,
                    'results' => [
                        'weekday_class' => 'App\Models\WeekdayStrategy\Monday',
                        'day' => 'segunda-feira'
                    ]
                ]
            ],
            'Is Tuesday' => [
                [
                    'date_format' => 'Y-m-d',
                    'date' => '2021-10-12',
                    'special_dates' => null,
                    'results' => [
                        'weekday_class' => 'App\Models\WeekdayStrategy\Tuesday',
                        'day' => 'terça-feira'
                    ]
                ]
            ],
            'Is Wednesday' => [
                [
                    'date_format' => 'Y-m-d',
                    'date' => '2021-10-13',
                    'special_dates' => null,
                    'results' => [
                        'weekday_class' => 'App\Models\WeekdayStrategy\Wednesday',
                        'day' => 'quarta-feira'
                    ]
                ]
            ],
            'Is Thursday' => [
                [
                    'date_format' => 'Y-m-d',
                    'date' => '2021-10-14',
                    'special_dates' => null,
                    'results' => [
                        'weekday_class' => 'App\Models\WeekdayStrategy\Thursday',
                        'day' => 'quinta-feira'
                    ]
                ]
            ],
            'Is Friday' => [
                [
                    'date_format' => 'Y-m-d',
                    'date' => '2021-10-15',
                    'special_dates' => null,
                    'results' => [
                        'weekday_class' => 'App\Models\WeekdayStrategy\Friday',
                        'day' => 'sexta-feira'
                    ]
                ]
            ],
            'Is Saturday' => [
                [
                    'date_format' => 'Y-m-d',
                    'date' => '2021-10-16',
                    'special_dates' => null,
                    'results' => [
                        'weekday_class' => 'App\Models\WeekdayStrategy\Saturday',
                        'day' => 'sábado'
                    ]
                ]
            ],

        ];
    }

    public function withSpecialDates(): array
    {
        return [
            'No special dates added' => [
                [
                    'date' => '2021-12-25',
                    'date_format' => 'Y-m-d',
                    'special_dates' => null,
                    'results' => [
                        'weekday_class' => 'App\Models\WeekdayStrategy\Saturday',
                        'day' => 'sábado',
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
                        'weekday_class' => 'App\Models\WeekdayStrategy\Friday',
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
                        'weekday_class' => 'App\Models\WeekdayStrategy\Saturday',
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
                        'weekday_class' => 'App\Models\WeekdayStrategy\Monday',
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
                        'weekday_class' => 'App\Models\WeekdayStrategy\Saturday',
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
                        'weekday_class' => 'App\Models\WeekdayStrategy\Friday',
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
