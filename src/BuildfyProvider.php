<?php

namespace Larawise\Assetify;

use Illuminate\View\Factory;
use Larawise\Packagify\Packagify;
use Larawise\Packagify\PackagifyProvider;

/**
 * Srylius - The ultimate symphony for technology architecture!
 *
 * @package     Larawise
 * @subpackage  Buildfy
 * @version     v1.0.0
 * @author      Selçuk Çukur <hk@selcukcukur.com.tr>
 * @copyright   Srylius Teknoloji Limited Şirketi
 *
 * @see https://docs.larawise.com/ Larawise : Docs
 */
class BuildfyProvider extends PackagifyProvider
{
    /**
     * Configure the packagify package.
     *
     * @param Packagify $package
     *
     * @return void
     */
    public function configure(Packagify $package)
    {
        // Set the package name.
        $package->name('buildfy');

        // Set the package description.
        $package->description('Buildfy');

        // Enable configuration discovery for the Packagify package.
        $package->hasConfigurations();
    }
}
