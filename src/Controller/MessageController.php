<?php

namespace App\Controller;


use App\Constant\MessageGroups;
use App\Entity\Message;
use App\Helper\Paginator;
use App\Repository\MessageRepository;
use App\Service\MailerService;
use Doctrine\ORM\EntityManagerInterface;
use FOS\RestBundle\Request\ParamFetcherInterface;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use FOS\RestBundle\Controller\Annotations as Rest;
use App\Component\Annotation as Param;

class MessageController extends AbstractController
{
    public function __construct(private MailerService $mailerService)
    {
    }

    #[Rest\Get(path: '/messages', name: 'index-messages')]
    #[Param\Limit]
    #[Param\Page]
    public function index(
        ParamFetcherInterface $paramFetcher,
        MessageRepository     $repository
    ): Response
    {
        $page = Paginator::paginate(
            $repository->index(),
            $paramFetcher->get('page'),
            $paramFetcher->get('limit')
        );

        return $this->object($page, groups: MessageGroups::INDEX);
    }

    #[Rest\Post(path: '/messages', name: 'create-messages')]
    #[Param\Instance]
    public function create(
        EntityManagerInterface $manager,
        Request $request
    ): Response
    {
        $request = $request->toArray();

        $message = new Message();
        $message->setTitle($request['title']);
        $message->setContent($request['content']);

        $manager->persist($message);
        $manager->flush();

        $this->mailerService->execute($message);

        return $this->object(
            $message,
            201,
            MessageGroups::INDEX
        );
    }
}