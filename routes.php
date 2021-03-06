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
      'firstPost' => [
        'controller' => '\OpenClassrooms\Blog\Controller\FrontController',
        'action' => 'firstPost'
      ],
      'mentionsLegales' => [
        'controller' => '\OpenClassrooms\Blog\Controller\FrontController',
        'action' => 'mentionsLegales'
      ],
      'author' => [
          'controller' => '\OpenClassrooms\Blog\Controller\FrontController',
          'action' => 'author'
      ],
      'adminLoginForm' => [
        'controller' => '\OpenClassrooms\Blog\Controller\FrontController',
        'action' => 'adminLoginForm'
      ], 
      'login' => [
        'controller' => '\OpenClassrooms\Blog\Controller\LogController',
        'action' => 'login'
      ], 
      'logout' => [
        'controller' => '\OpenClassrooms\Blog\Controller\LogController',
        'action' => 'logout'
      ], 
      'adminLoginFormOut' => [
        'controller' => '\OpenClassrooms\Blog\Controller\FrontController',
        'action' => 'adminLoginFormOut'
      ], 
      'adminLoginFormRequired' => [
        'controller' => '\OpenClassrooms\Blog\Controller\FrontController',
        'action' => 'adminLoginFormRequired'
      ], 
      'administration' => [
        'controller' => '\OpenClassrooms\Blog\Controller\BackController',
        'action' => 'adm'
      ], 
      'listPostsAdm' => [
        'controller' => '\OpenClassrooms\Blog\Controller\BackController',
        'action' => 'listPostsAdm'
      ], 
      'listCommentsAdm' => [
        'controller' => '\OpenClassrooms\Blog\Controller\BackController',
        'action' => 'listCommentsAdm'
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



        

          

        

        



   