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
        $this->ffStore = $this->ff->store($this->ffStoreToUse);

        $this->ffStore->setReadIndex(false);

        return $this->update($data);
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

    public function getMfCategoryParent($childCategoryId)
    {
        $childCategory = $this->getById($childCategoryId);

        if ($childCategory && isset($childCategory['parent_id'])) {
            return $this->getById($childCategory['parent_id']);
        }

        return false;
    }

    public function calculateCategoriesPercentDiff($mainCategory, $withCategory)
    {
        if ((float) $mainCategory <= 0 || (float) $withCategory <= 0) {
            $this->addResponse('Numbers cannot be less than or equal to 0', 1);

            return false;
        }

        //We switch the lower values and assign it to from.
        if ($mainCategory > $withCategory) {
            $from = (float) $withCategory;
            $with = (float) $mainCategory;
        } else if ($withCategory > $mainCategory) {
            $from = (float) $mainCategory;
            $with = (float) $withCategory;
        } else if ($withCategory == $mainCategory) {
            $this->addResponse('Calculated', 0, ['diff' => 0 . '%']);

            return 0;
        }

        $diff = numberFormatPrecision((($with - $from) / $from) * 100, 2);

        $this->addResponse('Calculated', 0, ['diff' => $diff . '%']);

        return $diff;
    }
}