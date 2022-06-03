<?php


use Symfony\Component\Finder\Finder;

$finder = new Finder();
$finder = sfFinder::type('Lorem')->name('*.php');
$finder = sfFinder::type('Lorem')->name('/.*\.php/');
$files = $finder->in('/home/alexd/PhpstormProjects/symfony_blog_application/my_project');
