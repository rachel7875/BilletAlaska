<?php
  function getRoutes() {
  	return [
      'listChapters' => [
        'controller' => '\OpenClassrooms\Blog\Controller\FrontController',
        'action' => 'listPosts'
      ],
      'post' => [
        'controller' => '\OpenClassrooms\Blog\Controller\FrontController',
        'action' => 'post'
      ],
      'reportComment' => [
        'controller' => '\OpenClassrooms\Blog\Controller\FrontController',
        'action' => 'reportComment'
      ],
      'addComment' => [
        'controller' => '\OpenClassrooms\Blog\Controller\FrontController',
        'action' => 'addComment'
      ],
      'nbLastPost' => [
        'controller' => '\OpenClassrooms\Blog\Controller\FrontController',
        'action' => 'nbLastPost'
      ],
      'mentionsLegales' => [
        'controller' => '\OpenClassrooms\Blog\Controller\FrontController',
        'action' => 'mentionsLegales'
      ],
      'administration' => [
        'controller' => '\OpenClassrooms\Blog\Controller\BackController',
        'action' => 'listsAdm'
      ], 
      'rectifyFormPost' => [
        'controller' => '\OpenClassrooms\Blog\Controller\BackController',
        'action' => 'rectifyFormPost'
      ], 
      'viewPostAdm' => [
        'controller' => '\OpenClassrooms\Blog\Controller\BackController',
        'action' => 'viewPost'
      ],
      'rectifySavePost' => [
        'controller' => '\OpenClassrooms\Blog\Controller\BackController',
        'action' => 'rectifyPost'
      ],
      'deletePost' => [
        'controller' => '\OpenClassrooms\Blog\Controller\BackController',
        'action' => 'deletePost'
      ],
      'addFormPost' => [
        'controller' => '\OpenClassrooms\Blog\Controller\BackController',
        'action' => 'addFormPost'
      ],
      'addPost' => [
        'controller' => '\OpenClassrooms\Blog\Controller\BackController',
        'action' => 'addPost'
      ],
      'moderateFormComment' => [
        'controller' => '\OpenClassrooms\Blog\Controller\BackController',
        'action' => 'moderateFormComment'
      ],
      'rectifySaveComment' => [
        'controller' => '\OpenClassrooms\Blog\Controller\BackController',
        'action' => 'rectifyComment'
      ],
      'deletePublicComment' => [
        'controller' => '\OpenClassrooms\Blog\Controller\BackController',
        'action' => 'deletePublicComment'
      ],
      'restorePublicComment' => [
        'controller' => '\OpenClassrooms\Blog\Controller\BackController',
        'action' => 'restorePublicComment'
      ],
      'addFormComment' => [
        'controller' => '\OpenClassrooms\Blog\Controller\BackController',
        'action' => 'addFormComment'
      ],
      'addCommentAdm' => [
        'controller' => '\OpenClassrooms\Blog\Controller\BackController',
        'action' => 'addCommentAdm'
      ],
    ];
	}



        

          

        

        



   