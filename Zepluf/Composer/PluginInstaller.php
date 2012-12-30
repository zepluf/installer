<?php
/**
 * Created by RubikIntegration Team.
 * Date: 12/30/12
 * Time: 2:02 PM
 * Question? Come to our website at http://rubikintegration.com
 * For the full copyright and license information, please view the LICENSE
 * file that was distributed with this source code.
 */

namespace Zepluf\Composer;

use Composer\Package\PackageInterface;
use Composer\Installer\LibraryInstaller;

class PluginInstaller extends LibraryInstaller {
    /**
     * {@inheritDoc}
     */
    public function getInstallPath(PackageInterface $package) {
        $prefix = substr ($package->getPrettyName (), 0, 17);
        if ('zepluf/plugin-' !== $prefix) {
            throw new \InvalidArgumentException(
                'Unable to install plugin, ZePLUF plugin package names  should always begin with "zepluf/plugin-"'
            );
        }

        return 'app/plugins/'.substr($package->getPrettyName(), 17);
    }

    /**
     * {@inheritDoc}
     */
    public function supports($packageType) {
        return 'zepluf-plugin' === $packageType;
    }
}