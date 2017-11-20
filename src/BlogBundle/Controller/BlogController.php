<?php
/**
 * This file contains BlogController class
 *
 * @author Sergii Bubalo <sergii.bubalo@gmail.com>
 *
 * Free license
 */

namespace BlogBundle\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\Controller;

/**
 * Handle requests to front-end of application
 *
 * Class BlogController
 * @package BlogBundle\Controller
 */
class BlogController extends Controller
{
    /**
     * This method handle GET request to "blog" path
     *
     * @return \Symfony\Component\HttpFoundation\Response
     */
    public function articleListAction()
    {
        $blogRepository = $this->getDoctrine()->getRepository('BlogBundle:Blog');
        $articles = $blogRepository->findBy([], ['created_at' => 'DESC']);

        return $this->render('BlogBundle:Blog:articleList.html.twig', [
            'articles' => $articles,
        ]);
    }

    /**
     * This method handle GET request to "blog/{id}" path
     *
     * @param $id
     * @return \Symfony\Component\HttpFoundation\Response
     */
    public function articleItemAction($id)
    {
        $blogRepository = $this->getDoctrine()->getRepository('BlogBundle:Blog');
        $article = $blogRepository->find($id);

        return $this->render('BlogBundle:Blog:articleItem.html.twig', [
            'article' => $article,
        ]);
    }
}
