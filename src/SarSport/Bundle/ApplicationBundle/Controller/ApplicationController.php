<?php

namespace SarSport\Bundle\ApplicationBundle\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\Controller;

use SarSport\Bundle\ApplicationBundle\Entity\Application;
use SarSport\Bundle\ApplicationBundle\Form\ApplicationType;

/**
 * Application controller.
 *
 */
class ApplicationController extends Controller
{
    /**
     * Lists all Application entities.
     *
     */
    public function indexAction()
    {
        $em = $this->getDoctrine()->getEntityManager();

        $entities = $em->getRepository('SarSportApplicationBundle:Application')->findAll();

        return $this->render('SarSportApplicationBundle:Application:index.html.twig', array(
            'entities' => $entities
        ));
    }

    /**
     * Finds and displays a Application entity.
     *
     */
    public function showAction($id)
    {
        $em = $this->getDoctrine()->getEntityManager();

        $entity = $em->getRepository('SarSportApplicationBundle:Application')->find($id);

        if (!$entity) {
            throw $this->createNotFoundException('Unable to find Application entity.');
        }

        $deleteForm = $this->createDeleteForm($id);

        return $this->render('SarSportApplicationBundle:Application:show.html.twig', array(
            'entity'      => $entity,
            'delete_form' => $deleteForm->createView(),

        ));
    }

    /**
     * Displays a form to create a new Application entity.
     *
     */
    public function newAction()
    {
        $entity = new Application();
        $form   = $this->createForm(new ApplicationType(), $entity);

        return $this->render('SarSportApplicationBundle:Application:new.html.twig', array(
            'entity' => $entity,
            'form'   => $form->createView()
        ));
    }

    /**
     * Creates a new Application entity.
     *
     */
    public function createAction()
    {
        $entity  = new Application();
        $request = $this->getRequest();
        $form    = $this->createForm(new ApplicationType(), $entity);
        $form->bindRequest($request);

        if ($form->isValid()) {
            $em = $this->getDoctrine()->getEntityManager();
            $em->persist($entity);
            $em->flush();

            return $this->redirect($this->generateUrl('application_show', array('id' => $entity->getId())));
            
        }

        return $this->render('SarSportApplicationBundle:Application:new.html.twig', array(
            'entity' => $entity,
            'form'   => $form->createView()
        ));
    }

    /**
     * Displays a form to edit an existing Application entity.
     *
     */
    public function editAction($id)
    {
        $em = $this->getDoctrine()->getEntityManager();

        $entity = $em->getRepository('SarSportApplicationBundle:Application')->find($id);

        if (!$entity) {
            throw $this->createNotFoundException('Unable to find Application entity.');
        }

        $editForm = $this->createForm(new ApplicationType(), $entity);
        $deleteForm = $this->createDeleteForm($id);

        return $this->render('SarSportApplicationBundle:Application:edit.html.twig', array(
            'entity'      => $entity,
            'edit_form'   => $editForm->createView(),
            'delete_form' => $deleteForm->createView(),
        ));
    }

    /**
     * Edits an existing Application entity.
     *
     */
    public function updateAction($id)
    {
        $em = $this->getDoctrine()->getEntityManager();

        $entity = $em->getRepository('SarSportApplicationBundle:Application')->find($id);

        if (!$entity) {
            throw $this->createNotFoundException('Unable to find Application entity.');
        }

        $editForm   = $this->createForm(new ApplicationType(), $entity);
        $deleteForm = $this->createDeleteForm($id);

        $request = $this->getRequest();

        $editForm->bindRequest($request);

        if ($editForm->isValid()) {
            $em->persist($entity);
            $em->flush();

            return $this->redirect($this->generateUrl('application_edit', array('id' => $id)));
        }

        return $this->render('SarSportApplicationBundle:Application:edit.html.twig', array(
            'entity'      => $entity,
            'edit_form'   => $editForm->createView(),
            'delete_form' => $deleteForm->createView(),
        ));
    }

    /**
     * Deletes a Application entity.
     *
     */
    public function deleteAction($id)
    {
        $form = $this->createDeleteForm($id);
        $request = $this->getRequest();

        $form->bindRequest($request);

        if ($form->isValid()) {
            $em = $this->getDoctrine()->getEntityManager();
            $entity = $em->getRepository('SarSportApplicationBundle:Application')->find($id);

            if (!$entity) {
                throw $this->createNotFoundException('Unable to find Application entity.');
            }

            $em->remove($entity);
            $em->flush();
        }

        return $this->redirect($this->generateUrl('application'));
    }

    private function createDeleteForm($id)
    {
        return $this->createFormBuilder(array('id' => $id))
            ->add('id', 'hidden')
            ->getForm()
        ;
    }
}
