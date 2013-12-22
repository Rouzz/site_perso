<?php

namespace CoteSud;

use CoteSud\Model\News;
use CoteSud\Model\NewsTable;
use Zend\Db\ResultSet\ResultSet;
use Zend\Db\TableGateway\TableGateway;

class Module
{
    public function getAutoloaderConfig()
    {
        return array(
            'Zend\Loader\ClassMapAutoloader' => array(
                __DIR__ . '/autoload_classmap.php',
            ),
            'Zend\Loader\StandardAutoloader' => array(
                'namespaces' => array(
                    __NAMESPACE__ => __DIR__ . '/src/' . __NAMESPACE__,
                ),
            ),
        );
    }

    public function getConfig()
    {
        return include __DIR__ . '/config/module.config.php';
    }
    
    public function getServiceConfig()
     {
         return array(
             'factories' => array(
                 'CoteSud\Model\NewsTable' =>  function($sm) {
                     $tableGateway = $sm->get('NewsTableGateway');
                     $table = new AlbumTable($tableGateway);
                     return $table;
                 },
                 'NewsTableGateway' => function ($sm) {
                     $dbAdapter = $sm->get('Zend\Db\Adapter\Adapter');
                     $resultSetPrototype = new ResultSet();
                     $resultSetPrototype->setArrayObjectPrototype(new Album());
                     return new TableGateway('news', $dbAdapter, null, $resultSetPrototype);
                 },
             ),
         );
     }
}

?>
