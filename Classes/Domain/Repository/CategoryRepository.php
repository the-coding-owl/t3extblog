<?php

namespace FelixNagel\T3extblog\Domain\Repository;

/***************************************************************
 *  Copyright notice
 *
 *  (c) 2013-2018 Felix Nagel <info@felixnagel.com>
 *
 *  All rights reserved
 *
 *  This script is part of the TYPO3 project. The TYPO3 project is
 *  free software; you can redistribute it and/or modify
 *  it under the terms of the GNU General Public License as published by
 *  the Free Software Foundation; either version 3 of the License, or
 *  (at your option) any later version.
 *
 *  The GNU General Public License can be found at
 *  http://www.gnu.org/copyleft/gpl.html.
 *
 *  This script is distributed in the hope that it will be useful,
 *  but WITHOUT ANY WARRANTY; without even the implied warranty of
 *  MERCHANTABILITY or FITNESS FOR A PARTICULAR PURPOSE.  See the
 *  GNU General Public License for more details.
 *
 *  This copyright notice MUST APPEAR in all copies of the script!
 ***************************************************************/

use TYPO3\CMS\Extbase\Persistence\QueryInterface;

/**
 * CategoryRepository.
 */
class CategoryRepository extends AbstractRepository
{
    protected $defaultOrderings = array(
        'sorting' => QueryInterface::ORDER_ASCENDING,
        'name' => QueryInterface::ORDER_ASCENDING,
    );

    /**
     * Returns all children of the given category
     *
     * @todo Rework this when extbase bug is fixed:
     * https://forge.typo3.org/issues/57272
     *
     * @param \FelixNagel\T3extblog\Domain\Model\Category $category
     *
     * @return array|\TYPO3\CMS\Extbase\Persistence\QueryResultInterface
     */
    public function findChildren($category)
    {
        if (!$category->isFirstLevel()) {
            return null;
        }

        $query = $this->createQuery();
        $query->getQuerySettings()->setRespectSysLanguage(false);

        $query->matching(
            $query->equals('parent_id', $category->getUid())
        );

        return $query->execute();
    }
}
