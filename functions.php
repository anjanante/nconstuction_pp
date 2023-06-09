<?php

/**
 * Used to store different static data.
 *
 * @var array
 */
$config = [
    'name' => 'NantConstruction',
];

/**
 * Displays site name. Uses $config global.
 */
function siteName()
{
    global $config;
    return $config['name'];
}

/**
 * Displays page title. It takes the data from
 * URL, it replaces the hyphens with spaces and
 * it capitalizes the words.
 */
function pageTitle()
{
    $page = isset($_GET['page']) ? htmlspecialchars($_GET['page']) : 'home';
    return ucfirst(str_replace('-', ' ', $page));
}

/**
 * Displays page content. It takes the data from
 * the static pages inside the pages/ directory.
 * When not found, display the 404 error page.
 */
function pageContent()
{
    $page = $_GET['page'] ?? 'home';
    $path = getcwd().'/pages/'.$page.'.php';
    return file_exists($path) ? file_get_contents($path) : file_get_contents('pages/404.php');
}

/**
 * get active class for header link
 * @param $s_page
 */
function activePage($s_page)
{
    $page = $_GET['page'] ?? 'home';
    if($page == $s_page) {
        return 'active';
    }
    return '';
}
