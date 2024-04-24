<?php
/**
 * Record controller.
 */

namespace App\Controller;

use App\Repository\RecordRepository;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Attribute\Route;

/**
 * Class RecordController.
 */
#[Route('/record')]
class RecordController extends AbstractController
{
    /**
     * Index action.
     *
     * @param RecordRepository $repository Record repository
     *
     * @return Response HTTP response
     */
    #[Route(
        name: 'record_index',
        methods: 'GET'
    )]
    public function index(RecordRepository $repository): Response
    {
        $records = $repository->findAll();

        return $this->render(
            'record/index.html.twig',
            ['records' => $records]
        );
    }

    #[Route(
        '/{id}',
        name: 'record_show',
        requirements: ['id' => '[1-9]\d*'],
        methods: 'GET'
    )]
    public function show(int $id): Response
    {

        $records = $repository->findOneByID($id);

        return $this->render(
            'record/show.html.twig',
            ['record' => $record]
        );
        return new Response(content: 'Record details #'.$id);
    }
}

