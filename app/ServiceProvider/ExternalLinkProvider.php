<?php

namespace Kanboard\ServiceProvider;

use Pimple\Container;
use Pimple\ServiceProviderInterface;
use Kanboard\Core\ExternalLink\ExternalLinkManager;
use Kanboard\ExternalLink\WebLinkProvider;
use Kanboard\ExternalLink\AttachmentLinkProvider;

/**
 * External Link Provider
 *
 * @package serviceProvider
 * @author  Frederic Guillot
 */
class ExternalLinkProvider implements ServiceProviderInterface
{
    /**
     * Register providers
     *
     * @access public
     * @param  \Pimple\Container $container
     * @return \Pimple\Container
     */
    public function register(Container $container)
    {
        $container['externalLinkManager'] = new ExternalLinkManager($container);
        $container['externalLinkManager']->register(new WebLinkProvider($container));
        $container['externalLinkManager']->register(new AttachmentLinkProvider($container));

        return $container;
    }
}
