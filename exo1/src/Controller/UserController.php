<?php

	namespace App\Controller;

	use Symfony\Component\HttpFoundation\Response;
	use App\Entity\User;
	use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
	use Symfony\Component\Routing\Annotation\Route;

	class UserController extends AbstractController
	{
	/**
	* @Route("/user", name="user")
	*/

	// public function index()
 //    {
 //        return $this->render('user/index.html.twig', [
 //            'controller_name' => 'UserController',
 //        ]);
 //    }
	public function createUser(): Response
	{
	// you can fetch the EntityManager via $this->getDoctrine()
	// or you can add an argument to the action: createProduct(EntityManagerInterface $entityManager)

		$entityManager = $this->getDoctrine()->getManager();

		$user = new User();
		$user->setName('Fate');
		$user->setFirstName('Tobias');
		$user->setAdress('Somewhere over the rainbow !');

	// tell Doctrine you want to (eventually) save the Product (no queries yet)
		$entityManager->persist($user);

	// actually executes the queries (i.e. the INSERT query)
		//$entityManager->flush();

		return new Response('Saved new user with id '.$user->getId());
	}
}
?>