<?php

namespace App\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\Routing\Annotation\Route;
use App\Entity\Bien;
use Knp\Component\Pager\PaginatorInterface;

class HomeController extends AbstractController
{
    /**
     * @Route("/", name="home")
     */
    public function index(Request $request, PaginatorInterface $paginator)
    {
         // Retrieve the entity manager of Doctrine
        $em = $this->getDoctrine()->getManager();
        
        // Get some repository of data, in our case we have an Bien entity
        $appointmentsRepository = $em->getRepository(Bien::class);
                
        // Find all the data on the Bien table, filter your query as you need
        $allBiensQuery = $appointmentsRepository->createQueryBuilder('bien')
        	->orderBy('bien.id', 'DESC')
            ->getQuery();
        
        // Paginate the results of the query
        $biens = $paginator->paginate(
            // Doctrine Query, not results
            $allBiensQuery,
            // Define the page parameter
            $request->query->getInt('page', 1),
            // Items per page
            6
        );
        
        // Render the twig view
        return $this->render('home/index.html.twig', [
            'biens' => $biens
        ]);
    }
}
