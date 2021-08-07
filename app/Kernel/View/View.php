<?php

namespace App\Kernel\View;

use Twig\Loader\FilesystemLoader as TwigLoader;
use Twig\Environment as TwigEnv;

class View
{
	private $twigLoader;

	private $twig;

	public function __construct()
	{
		$this->twigLoader = new TwigLoader(VIEWS_PATH);

		$this->twig = new TwigEnv($this->twigLoader, [
			'cache' => CACHE_PATH.'/views',
			'debug' => (bool) $_ENV['APP_DEBUG']
		]);
	}

	public function render($template, $vars = [])
	{
		echo $this->twig->render($template, $vars);
	}
}
