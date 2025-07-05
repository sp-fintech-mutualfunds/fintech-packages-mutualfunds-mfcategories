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

        if ($data['turn_around_time'] === '') {
            $data['turn_around_time'] = null;
        }

        return $this->update($data);
    }

    public function removeMfCategories($data)
    {
        //
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

        $total = $mainCategory + $withCategory;

        $mainCategoryPercent = ($mainCategory / $total) * 100;
        $withCategoryPercent = ($withCategory / $total) * 100;

        if ($mainCategoryPercent >= $withCategoryPercent) {
            $diff = $mainCategoryPercent - $withCategoryPercent;
        } else {
            $diff = $withCategoryPercent - $mainCategoryPercent;
        }

        $this->addResponse('Calculated', 0, ['diff' => $diff . '%']);

        return $diff;
    }

    public function getCategoryTurnAroundTime($categoryId)
    {
        //
    }
}