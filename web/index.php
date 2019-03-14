<?php

use BilletSimple\Engine\Routing\Route;
use BilletSimple\Engine\Routing\Router;
use BilletSimple\Engine\Routing\RouteCollection;

require_once '../vendor/autoload.php';

$routes = new RouteCollection();

// GET
$routes->add(
    '404',
    new Route('404',
        '/',
        'GET',
        '.*',
        ['_controller' => 'ErrorController'],
        'index'));
$routes->add(
    'table',
    new Route('table',
        '/table',
        'GET',
        '',
        ['_controller' => 'TableController'],
        'index'));
$routes->add(
    'contact',
    new Route('contact',
        '/contact',
        'GET',
        '',
        ['_controller' => 'ContactController'],
        'index'));
$routes->add(
    'chapter',
    new Route('chapter',
        '/chapitre-',
        'GET',
        '[0-9]+-[0-9]+',
        ['_controller' => 'ChapterController'],
        'index'));
$routes->add(
    'homepage',
    new Route('homepage',
        '/',
        'GET',
        '',
        ['_controller' => 'HomeController'],
        'index'));
$routes->add(
    'admin',
    new Route('admin',
        '/admin',
        'GET',
        '',
        ['_controller' => 'AdminController'],
        'index'));
$routes->add(
    'connection',
    new Route('connection',
        '/connexion',
        'GET',
        '',
        ['_controller' => 'UserController'],
        'connection'));
$routes->add(
    'newChapter',
    new Route('newChapter',
        '/admin/nouveau-chapitre',
        'GET',
        '',
        ['_controller' => 'AdminController'],
        'writeChapter'));
$routes->add(
    'editChapters',
    new Route('editChapters',
        '/admin/edition-chapitre',
        'GET',
        '',
        ['_controller' => 'AdminController'],
        'editChapters'));
$routes->add(
    'updateChapter',
    new Route('updateChapter',
        '/admin/editer-chapitre-',
        'GET',
        '[0-9]+',
        ['_controller' => 'AdminController'],
        'updateChapter'));
$routes->add(
    'editComments',
    new Route('editComments',
        '/admin/editer-commentaires',
        'GET',
        '',
        ['_controller' => 'AdminController'],
        'editComments'));
$routes->add(
    'listReportings',
    new Route('listReportings',
        '/admin/signalements-commentaire-',
        'GET',
        '[0-9]+',
        ['_controller' => 'AdminController'],
        'listReportings'));
$routes->add(
    'editUser',
    new Route('editUser',
        '/admin/editer-utilisateur',
        'GET',
        '',
        ['_controller' => 'AdminController'],
        'editUser'));
$routes->add(
    'accessDenied',
    new Route('editUser',
        '/admin/editer-utilisateur',
        'GET',
        '',
        ['_controller' => 'AdminController'],
        'editUser'));
$routes->add(
    'disconnect',
    new Route('disconnect',
        '/deconnexion',
        'GET',
        '',
        ['_controller' => 'UserController'],
        'disconnect'));

// POST
$routes->add(
    'addComment',
    new Route('addComment',
        '/ajoutCommentaire/chapitre-',
        'POST',
        '[0-9]+-[0-9]+',
        ['_controller' => 'ChapterController'],
        'addComment'));
$routes->add(
    'reportComment',
    new Route('reportComment',
        '/signalement/commentaire-',
        'POST',
        '[0-9]+',
        ['_controller' => 'ChapterController'],
        'reportComment'));
$routes->add(
    'postChapter',
    new Route('postChapter',
        '/admin/publierChapitre',
        'POST',
        '',
        ['_controller' => 'AdminController'],
        'postChapter'));
$routes->add(
    'postEditChapter',
    new Route('postEditChapter',
        '/admin/editer-chapitre-',
        'POST',
        '[0-9]+',
        ['_controller' => 'AdminController'],
        'postEditChapter'));
$routes->add(
    'deleteChapter',
    new Route('deleteChapter',
        '/admin/supprimer-chapitre-',
        'POST',
        '[0-9]+',
        ['_controller' => 'AdminController'],
        'deleteChapter'));
$routes->add(
    'deleteComment',
    new Route('deleteComment',
        '/admin/supprimer-commentaire-',
        'POST',
        '[0-9]+',
        ['_controller' => 'AdminController'],
        'deleteComment'));
$routes->add(
    'deleteReporting',
    new Route('deleteReporting',
        '/admin/supprimer-signalement-',
        'POST',
        '[0-9]+',
        ['_controller' => 'AdminController'],
        'deleteReporting'));
$routes->add(
    'createUser',
    new Route('createUser',
        '/nouvel-utilisateur',
        'POST',
        '',
        ['_controller' => 'AdminController'],
        'createUser'));
$routes->add(
    'checkUser',
    new Route('checkUser',
        '/verifier-utilisateur',
        'POST',
        '',
        ['_controller' => 'UserController'],
        'checkUser'));
$routes->add(
    'deleteUser',
    new Route('deleteUser',
        '/admin/supprimer-utilisateur-',
        'POST',
        '[0-9]+',
        ['_controller' => 'AdminController'],
        'deleteUser'));


$router = new Router($routes);

$router->match();
$router->call();