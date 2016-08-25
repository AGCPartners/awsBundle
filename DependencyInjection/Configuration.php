<?php

/*
 * This file is part of the SeferovAwsBundle package.
 *
 * (c) Farhad Safarov <http://ferhad.in>
 *
 * For the full copyright and license information, please view the LICENSE
 * file that was distributed with this source code.
 */

namespace Seferov\AwsBundle\DependencyInjection;

use Symfony\Component\Config\Definition\Builder\TreeBuilder;
use Symfony\Component\Config\Definition\ConfigurationInterface;

/**
 * Bundle configuration.
 *
 * @author Farhad Safarov <http://ferhad.in>
 */
class Configuration implements ConfigurationInterface
{
    /**
     * {@inheritDoc}
     */
    public function getConfigTreeBuilder()
    {
        $treeBuilder = new TreeBuilder();
        $rootNode = $treeBuilder->root('seferov_aws');

        $rootNode
            ->children()
                ->scalarNode('profile')
                    ->defaultValue(null)
                ->end()
                ->scalarNode('region')
                    ->defaultValue(null)
                ->end()
                ->scalarNode('version')
                    ->defaultValue(null)
                ->end()
                ->arrayNode('credentials')
                        ->children()
                            ->scalarNode('key')->end()
                            ->scalarNode('secret')->end()
                        ->end()
                    ->end()
                ->end()
                ->arrayNode('services')
                    ->useAttributeAsKey('name')
                    ->prototype('array')
                        ->children()
                            ->scalarNode('key')->end()
                            ->scalarNode('secret')->end()
                            ->scalarNode('region')->end()
                            ->scalarNode('profile')->end()
                        ->end()
                    ->end()
                ->end()
            ->end()
        ;

        return $treeBuilder;
    }
}
