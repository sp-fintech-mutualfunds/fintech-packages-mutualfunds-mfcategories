<?php

namespace Apps\Fintech\Packages\Mf\Categories\Model;

use System\Base\BaseModel;

class AppsFintechMfCategories extends BaseModel
{
    public $id;

    public $name;

    public $report_date;

    public $week_1;

    public $month_1;

    public $month_3;

    public $month_6;

    public $year_1;

    public $year_3;

    public $year_5;

    public $year_10;

    public $inception;
}