<?php

	namespace App\Controller;

	use App\Form\ArticleType;
	use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
	use Symfony\Component\Routing\Annotation\Route;

	class ArticleController extends AbstractController
	{
	/**
	* @Route("/article", name="article")
	*/
	public function index()
	{
		return $this->render('article/index.html.twig', [
			'controller_name' => 'ArticleController',
		]);
	}

	public function new()
	{
		$article = new Article();
		$form = $this->createForm(ArticleType::class, $article);
	}
}
