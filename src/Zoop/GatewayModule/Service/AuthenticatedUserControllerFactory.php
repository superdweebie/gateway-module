<?php
/**
 * @package    Zoop
 * @license    MIT
 */

namespace Zoop\GatewayModule\Service;

use Zoop\GatewayModule\Controller\AuthenticatedUserController;
use Zend\ServiceManager\FactoryInterface;
use Zend\ServiceManager\ServiceLocatorInterface;

/**
 *
 * @since   1.0
 * @version $Revision$
 * @author  Tim Roediger <superdweebie@gmail.com>
 */
class AuthenticatedUserControllerFactory implements FactoryInterface
{
    protected $restControllerMap;

    protected function getRestControllerMap($serviceLocator){
        if (!isset($this->restControllerMap)) {
            $this->restControllerMap = $serviceLocator->get('zoop.shardmodule.restcontrollermap');
        }
        return $this->restControllerMap;
    }

    /**
     *
     * @param  \Zend\ServiceManager\ServiceLocatorInterface $serviceLocator
     * @return object
     */
    public function createService(ServiceLocatorInterface $serviceLocator)
    {
        return new AuthenticatedUserController(
            $this->getRestControllerMap($serviceLocator->getServiceLocator())->getOptionsFromEndpoint('authenticated-user')
        );        
    }
}
