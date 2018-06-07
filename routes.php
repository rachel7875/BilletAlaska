<?php
  function getRoutes() {
  	return [
      'listChapters' => [
        'controller' => 'FrontController',
        'action' => 'listPosts'
      ],
      'post' => [
        'controller' => 'FrontController',
        'action' => 'post'
      ],
      'reportComment' => [
        'controller' => 'FrontController',
        'action' => 'reportComment'
      ],
      'addComment' => [
        'controller' => 'FrontController',
        'action' => 'addComment'
      ],
      'nbLastPost' => [
        'controller' => 'FrontController',
        'action' => 'nbLastPost()'
      ],
      'mentionsLegales' => [
        'controller' => 'FrontController',
        'action' => 'mentionsLegales()'
      ],
      'administration' => [
        'controller' => 'BackController',
        'action' => 'listsAdm()'
      ], 
      'rectifyFormPost' => [
        'controller' => 'BackController',
        'action' => 'rectifyFormPost()'
      ], 
      'viewPostAdm' => [
        'controller' => 'BackController',
        'action' => 'viewPost()'
      ],
      'rectifySavePost' => [
        'controller' => 'BackController',
        'action' => 'rectifyPost()'
      ],
      'deletePost' => [
        'controller' => 'BackController',
        'action' => 'deletePost()'
      ],
      'addFormPost' => [
        'controller' => 'BackController',
        'action' => 'addFormPost()'
      ],
      'addPost' => [
        'controller' => 'BackController',
        'action' => 'addPost()'
      ],
      'moderateFormComment' => [
        'controller' => 'BackController',
        'action' => 'moderateFormComment()'
      ],
      'rectifySaveComment' => [
        'controller' => 'BackController',
        'action' => 'rectifyComment()'
      ],
      'deletePublicComment' => [
        'controller' => 'BackController',
        'action' => 'deletePublicComment()'
      ],
      'restorePublicComment' => [
        'controller' => 'BackController',
        'action' => 'restorePublicComment()'
      ],
      'addFormComment' => [
        'controller' => 'BackController',
        'action' => 'addFormComment()'
      ],
      'addCommentAdm' => [
        'controller' => 'BackController',
        'action' => 'addCommentAdm()'
      ],
    ];
	}



        

          

        

        



   