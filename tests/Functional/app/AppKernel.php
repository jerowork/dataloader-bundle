<?php

/*
 * This file is part of the OverblogDataLoaderBundle package.
 *
 * (c) Overblog <http://github.com/overblog/>
 *
 * For the full copyright and license information, please view the LICENSE
 * file that was distributed with this source code.
 */

namespace Overblog\DataLoaderBundle\Tests\Functional\app;

use Symfony\Component\Config\Loader\LoaderInterface;
use Symfony\Component\HttpKernel\Kernel;

/**
 * AppKernel.
 */
class AppKernel extends Kernel
{
    private $testCase;

    public function registerBundles(): array
    {
        return [
            new \Symfony\Bundle\FrameworkBundle\FrameworkBundle(),
            new \Overblog\DataLoaderBundle\OverblogDataLoaderBundle(),
        ];
    }

    public function getCacheDir(): string
    {
        return sys_get_temp_dir().'/OverblogDataLoaderBundle/'.Kernel::VERSION.'/cache/'.$this->environment;
    }

    public function getLogDir(): string
    {
        return sys_get_temp_dir().'/OverblogDataLoaderBundle/'.Kernel::VERSION.'/logs';
    }

    public function getRootDir()
    {
        return __DIR__;
    }

    public function isBooted()
    {
        return $this->booted;
    }

    public function registerContainerConfiguration(LoaderInterface $loader)
    {
        $loader->load(__DIR__.'/config/config.yaml');
    }
}
