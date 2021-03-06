<?php

namespace FelixNagel\T3extblog\ViewHelpers\Frontend;

/***************************************************************
 *  Copyright notice
 *
 *  (c) 2016-2018 Felix Nagel <info@felixnagel.com>
 *  All rights reserved
 *
 *  This script is part of the TYPO3 project. The TYPO3 project is
 *  free software; you can redistribute it and/or modify
 *  it under the terms of the GNU General Public License as published by
 *  the Free Software Foundation; either version 2 of the License, or
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

use TYPO3\CMS\Backend\Backend\Avatar\AvatarProviderInterface;
use TYPO3\CMS\Core\Service\DependencyOrderingService;
use TYPO3\CMS\Core\Utility\GeneralUtility;
use TYPO3\CMS\Fluid\Core\ViewHelper\AbstractViewHelper;

/**
 * Get avatar for backend user.
 *
 * This VH does work for TYPO3 >= 7.5 only
 */
class BackendUserAvatarViewHelper extends AbstractViewHelper
{
    /**
     * Render the avatar image.
     *
     * @param int $uid
     * @param int $size
     * @param string $default
     *
     * @return string The image URL
     */
    public function render($uid, $size = 32, $default = null)
    {
        $url = $this->getAvatarUrl($uid, $size);

        if ($url !== null) {
            return $url;
        }

        return $this->noAvatarFound($default);
    }

    /**
     * Get avatar url using TYPO3 avatar provider.
     *
     * @param int $uid
     * @param int $size
     *
     * @return string|null
     */
    protected function getAvatarUrl($uid, $size)
    {
        $backendUser = $this->getDatabase()->exec_SELECTgetSingleRow('*', 'be_users', 'uid='.(int) $uid);

        foreach ($this->getAvatarProviders() as $provider) {
            /* @var $provider AvatarProviderInterface */
            $avatarImage = $provider->getImage($backendUser, $size);

            if ($avatarImage !== null) {
                return $avatarImage->getUrl(true);
            }
        }

        return null;
    }

    /**
     * Taken from \TYPO3\CMS\Backend\Backend\Avatar\Avatar::validateSortAndInitiateAvatarProviders
     *
     * @throws \RuntimeException
     */
    protected function getAvatarProviders()
    {
        $avatarProviders = [];
        $providers = $GLOBALS['TYPO3_CONF_VARS']['EXTCONF']['backend']['avatarProviders'];

        $orderedProviders = GeneralUtility::makeInstance(DependencyOrderingService::class)
            ->orderByDependencies($providers);

        foreach ($orderedProviders as $configuration) {
            $avatarProviders[] = GeneralUtility::makeInstance($configuration['provider']);
        }

        return $avatarProviders;
    }

    /**
     * Called when no user avatar has been found.
     *
     * @param string $default Blank gif als fallback
     *
     * @return string
     */
    protected function noAvatarFound($default = null)
    {
        if ($default === null || strlen(trim($default)) < 10) {
            $default = 'data:image/gif;base64,R0lGODlhAQABAIAAAAAAAP///yH5BAEAAAAALAAAAAABAAEAAAIBRAA7';
        }

        return $default;
    }

    /**
     * Get database connection.
     *
     * @return \TYPO3\CMS\Core\Database\DatabaseConnection
     */
    protected function getDatabase()
    {
        return $GLOBALS['TYPO3_DB'];
    }
}
