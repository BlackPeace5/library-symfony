<?php


namespace App\Controller;

use App\Entity\Books;
use App\Form\BooksType;
use Symfony\Component\HttpFoundation\RedirectResponse;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

class BooksController extends BaseController
{
    /**
     * @Route("books/", name="books")
     * @return Response
     */
    public function index(): Response
    {
        $books = $this->getDoctrine()->getRepository(Books::class)
            ->findAll();

        $forRender = parent::renderDefault();
        $forRender['title'] = 'Список книг';
        $forRender['books'] = $books;
        return $this->render('books/index.html.twig', $forRender);
    }

    /**
    * @Route("/books/addbook", name="add_book")
    * @param Request $request
    * @return RedirectResponse|Response
    */

    public function addBook(Request $request): Response
    {
        $em = $this->getDoctrine()->getManager();
        $book = new Books();
        $form = $this->createForm(BooksType::class, $book);
        $form->handleRequest($request);
        if($form->isSubmitted() && $form->isValid()){
            $em->persist($book);
            $em->flush();
            $this->addFlash('success', 'Книга добавлена!');
            return $this->redirectToRoute('books');
        }

        $forRender = parent::renderDefault();
        $forRender['title'] = 'Добавение книги';
        $forRender['form'] = $form->createView();
        return $this->render('books/form.html.twig', $forRender);
    }

    /**
     * @Route("/books/updatebook/{id}", name="update_book")
     * @param int $id
     * @param Request $request
     * @return RedirectResponse|Response
     */
    public function updateBook(int $id, Request $request): Response
    {
        $em = $this->getDoctrine()->getManager();
        $book = $this->getDoctrine()->getRepository(Books::class)->find($id);
        $form = $this->createForm(BooksType::class, $book);
        $form ->handleRequest($request);
        if($form->isSubmitted() && $form->isValid()) {
            $em->flush();
            $this->addFlash('success', 'Данные изменены!');
            return $this->redirectToRoute('books');
        }

        $forRender = parent::renderDefault();
        $forRender['title'] = 'Обновление книги';
        $forRender['form'] = $form->createView();
        return $this->render('books/form.html.twig', $forRender);
    }
}