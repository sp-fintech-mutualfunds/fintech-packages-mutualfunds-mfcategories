<?php

namespace Apps\Fintech\Packages\Mf\Categories;

use System\Base\BasePackage;

class MfCategories extends BasePackage
{
    //protected $modelToUse = ::class;

    protected $packageName = 'mfcategories';

    public $mfcategories;

    public function getMfCategoriesById($id)
    {
        $mfcategories = $this->getById($id);

        if ($mfcategories) {
            //
            $this->addResponse('Success');

            return;
        }

        $this->addResponse('Error', 1);
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