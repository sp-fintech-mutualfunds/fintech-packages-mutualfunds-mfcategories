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

            $mfcategory = $this->getByParams($conditions);
        } else {
            $this->ffStore = $this->ff->store($this->ffStoreToUse);

            $this->ffStore->setReadIndex(false);

            $mfcategory = $this->ffStore->findBy(['name', '=', $name]);
        }

        if ($mfcategory && count($mfcategory) > 0) {
            return $mfcategory[0];
        }

        return false;
    }

    public function addMfCategories($data)
    {
        $this->ffStore = $this->ff->store($this->ffStoreToUse);

        $this->ffStore->setReadIndex(false);

        return $this->add($data);
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