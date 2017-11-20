<?php
/**
 * This file contains AdminController Class
 *
 * @author Sergii Bubalo <sergii.bubalo@gmail.com>
 *
 * Free license
 */

namespace BlogBundle\Controller;

use BlogBundle\Entity\Blog;
use BlogBundle\Form\ArticleType;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Symfony\Component\HttpFoundation\Request;

/**
 * Handle requests to admin part of application
 *
 * Class AdminController
 * @package BlogBundle\Controller
 */
class AdminController extends Controller
{
    /**
     * Handle GET & POST requests to "/article/add" path
     *
     * @param Request $request
     * @return \Symfony\Component\HttpFoundation\RedirectResponse|\Symfony\Component\HttpFoundation\Response
     */
    public function addArticleAction(Request $request) {
        $blog = new Blog();

        $form = $this->createForm(ArticleType::class, $blog);
        $form->handleRequest($request);

        if ($form->isValid() && $form->isSubmitted()) {
            $blog = $form->getData();

            $em = $this->getDoctrine()->getManager();

            $em->persist($blog);
            $em->flush();

            return $this->redirectToRoute('article.list');
        }

        return $this->render('BlogBundle:Admin:addArticle.html.twig', [
            'form' => $form->createView(),
        ]);
    }
}