<?php
return array(
     'controllers' => array(
         'invokables' => array(
             'CoteSud\Controller\News' => 'CoteSud\Controller\NewsController',
         ),
     ),

     // The following section is new and should be added to your file
     'router' => array(
         'routes' => array(
             'news' => array(
                 'type'    => 'segment',
                 'options' => array(
                     'route'    => '/news[/][:action][/:id]',
                     'constraints' => array(
                         'action' => '[a-zA-Z][a-zA-Z0-9_-]*',
                         'id'     => '[0-9]+',
                     ),
                     'defaults' => array(
                         'controller' => 'CoteSud\Controller\News',
                         'action'     => 'index',
                     ),
                 ),
             ),
             'home' => array(
                'type' => 'Zend\Mvc\Router\Http\Literal',
                'options' => array(
                    'route'    => '/',
                    'defaults' => array(
                        'controller' => 'CoteSud\Controller\News',
                        'action'     => 'index',
                    ),
                ),
            ),
         ),
     ),

     'view_manager' => array(
         'template_path_stack' => array(
             'news' => __DIR__ . '/../view',
         ),
     ),
 );