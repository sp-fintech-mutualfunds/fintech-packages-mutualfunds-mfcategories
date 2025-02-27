<?php

namespace Apps\Fintech\Packages\Mf\Categories;

use Apps\Fintech\Packages\Mf\Categories\Model\AppsFintechMfCategories;
use System\Base\BasePackage;

class MfCategories extends BasePackage
{
    protected $modelToUse = AppsFintechMfCategories::class;

    protected $packageName = 'mfcategories';

    public $mfcategories;

    public function getMfCategoryByName($name)
    {
        if ($this->config->databasetype === 'db') {
            $conditions =
                [
                    'conditions'    => 'name = :name:',
                    'bind'          =>
                        [
                            'name'  => $name
                        ]
                ];
        } else {
            $conditions =
                [
                    'conditions'    => [
                        ['name', '=', $name]
                    ]
                ];
        }

        $mfcategory = $this->getByParams($conditions);

        if ($mfcategory && count($mfcategory) > 0) {
            return $mfcategory[0];
        }

        return false;
    }

    public function addMfCategories($data)
    {
        //
    }

    public function updateMfCategories($data)
    {
        $mfcategories = $this->getById($id);

        if ($mfcategories) {
            //
            $this->addResponse('Success');

            return;
        }

        $this->addResponse('Error', 1);
    }

    public function removeMfCategories($data)
    {
        $mfcategories = $this->getById($id);

        if ($mfcategories) {
            //
            $this->addResponse('Success');

            return;
        }

        $this->addResponse('Error', 1);
    }
}