<?php

namespace Apps\Fintech\Packages\Mf\Categories\Model;

use System\Base\BaseModel;

class AppsFintechMfCategories extends BaseModel
{
    public $id;

    public $name;

    public $parent_id;

    public $turn_around_time;
}