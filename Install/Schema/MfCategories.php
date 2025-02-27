<?php

namespace Apps\Fintech\Packages\Mf\Categories\Install\Schema;

use Phalcon\Db\Column;
use Phalcon\Db\Index;

class MfCategories
{
    public function columns()
    {
        return
        [
           'columns' => [
                new Column(
                    'id',
                    [
                        'type'          => Column::TYPE_TINYINTEGER,
                        'notNull'       => true,
                        'autoIncrement' => true,
                        'primary'       => true,
                    ]
                ),
                new Column(
                    'name',
                    [
                        'type'          => Column::TYPE_VARCHAR,
                        'size'          => 100,
                        'notNull'       => true,
                    ]
                ),
                new Column(
                    'report_date',
                    [
                        'type'          => Column::TYPE_VARCHAR,
                        'size'          => 15,
                        'notNull'       => true,
                    ]
                ),
                new Column(
                    'week_1',
                    [
                        'type'          => Column::TYPE_FLOAT,
                        'notNull'       => false,
                    ]
                ),
                new Column(
                    'month_1',
                    [
                        'type'          => Column::TYPE_FLOAT,
                        'notNull'       => false,
                    ]
                ),
                new Column(
                    'month_3',
                    [
                        'type'          => Column::TYPE_FLOAT,
                        'notNull'       => false,
                    ]
                ),
                new Column(
                    'month_6',
                    [
                        'type'          => Column::TYPE_FLOAT,
                        'notNull'       => false,
                    ]
                ),
                new Column(
                    'year_1',
                    [
                        'type'          => Column::TYPE_FLOAT,
                        'notNull'       => false,
                    ]
                ),
                new Column(
                    'year_3',
                    [
                        'type'          => Column::TYPE_FLOAT,
                        'notNull'       => false,
                    ]
                ),
                new Column(
                    'year_5',
                    [
                        'type'          => Column::TYPE_FLOAT,
                        'notNull'       => false,
                    ]
                ),
                new Column(
                    'year_10',
                    [
                        'type'          => Column::TYPE_FLOAT,
                        'notNull'       => false,
                    ]
                ),
                new Column(
                    'inception',
                    [
                        'type'          => Column::TYPE_FLOAT,
                        'notNull'       => false,
                    ]
                ),
            ],
            'indexes' => [
                new Index(
                    'column_UNIQUE',
                    [
                        'name'
                    ],
                    'UNIQUE'
                )
            ],
            'options' => [
                'TABLE_COLLATION' => 'utf8mb4_general_ci'
            ]
        ];
    }

    public function indexes()
    {
        return
        [
            new Index(
                'column_INDEX',
                [
                    'name'
                ],
                'INDEX'
            )
        ];
    }
}