<?php

/**
 * This file is part of the SarSportApplicationBundle package.
 *
 * (c) Dmitry Petrov aka fightmaster <old.fightmaster@gmail.com>
 *
 * This source file is subject to the MIT license that is bundled
 * with this source code in the file LICENSE.
 */

namespace SarSport\Bundle\ApplicationBundle\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\Controller;

use SarSport\Bundle\ApplicationBundle\Entity\Application;
use SarSport\Bundle\ApplicationBundle\Form\ApplicationType;
use SarSport\Bundle\ApplicationBundle\Entity\ApplicationManager;
use Symfony\Component\HttpFoundation\Response;
use SarSport\Bundle\ApplicationBundle\Service\ApplicationService;
use SarSport\Bundle\UserBundle\Entity\User;
use SarSport\Bundle\ApplicationBundle\Model\ApplicationInterface;
use SarSport\Bundle\ApplicationBundle\Twig\ApplicationExtension;
use SarSport\Bundle\ApplicationBundle\Service\ExcelWriter;

/**
 * Application controller.
 *
 */
class ApplicationController extends Controller
{
    /**
     * Find all applications by competition parameter
     *
     * @param $competition
     * @return \Symfony\Component\HttpFoundation\Response
     */
    public function showApplicationsByCompetitionAction($competition)
    {
        $service = $this->getApplicationService();

        $entities = $service->findByCompetition($competition);

        return $this->render('SarSportApplicationBundle:Application:showApplicationsByCompetition.html.twig', array(
            'entities' => $entities,
            'competition' => $competition
        ));
    }

    /**
     * Download xls file with applications
     *
     * @param $competition
     */
    public function downloadApplicationsByCompetitionAction($competition)
    {
        $service = $this->getApplicationService();
        $twigExtension = $this->getTwigExtension();
        $translator = $this->getTranslator();

        $applications = $service->findByCompetition($competition);
        $competitionName = $translator->trans($twigExtension->getCompetitionName($competition), array(), 'SarSportApplicationBundle');
        $filename = $competitionName . '_' . date('d_m_y') . '.xls';

        $excelWriter = $this->getExcelWriterService();
        $excelWriter->setFilename($filename);
        $excelWriter->writeTitle($competitionName);
        $excelWriter->writeBody($applications);
        // Redirect output to a client’s web browser (Excel5)
        header('Content-Type: application/vnd.ms-excel');
        header('Content-Disposition: attachment;filename="' . $filename . '"');
        header('Cache-Control: max-age=0');
        $excelWriter->close();
        exit;
    }

    /**
     * Finds and displays a Application entity.
     *
     * @param $id
     * @return \Symfony\Component\HttpFoundation\Response
     * @throws \Symfony\Component\HttpKernel\Exception\NotFoundHttpException
     */
    public function showAction($id)
    {
        $service = $this->getApplicationService();

        $entity = $service->findApplicationById($id);

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
     * @return \Symfony\Component\HttpFoundation\Response
     */
    public function newAction()
    {
        $service = $this->getApplicationService();
        $entity = $service->create();
        $this->fillDefaultData($entity);
        $form   = $this->createForm(new ApplicationType(), $entity);

        return $this->render('SarSportApplicationBundle:Application:new.html.twig', array(
            'entity' => $entity,
            'form'   => $form->createView()
        ));
    }

    /**
     * Creates a new Application entity.
     *
     * @return \Symfony\Component\HttpFoundation\RedirectResponse|\Symfony\Component\HttpFoundation\Response
     */
    public function createAction()
    {
        $service = $this->getApplicationService();
        $entity = $service->create();
        $request = $this->getRequest();
        $form    = $this->createForm(new ApplicationType(), $entity);
        $form->bindRequest($request);

        if ($form->isValid()) {
            $service->save($entity);

            return $this->redirect($this->generateUrl('application_show', array('id' => $entity->getId())));
            
        }
        $tmp =  $form->createView();

        return $this->render('SarSportApplicationBundle:Application:new.html.twig', array(
            'entity' => $entity,
            'form'   => $form->createView()
        ));
    }

    /**
     * Displays a form to edit an existing Application entity.
     *
     * @param $id
     * @return \Symfony\Component\HttpFoundation\Response
     * @throws \Symfony\Component\HttpKernel\Exception\NotFoundHttpException
     */
    public function editAction($id)
    {
        $service = $this->getApplicationService();
        $entity = $service->findApplicationById($id);

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
     * @param $id
     * @throws #M#C\SarSport\Bundle\ApplicationBundle\Controller\ApplicationController.createNotFoundException|?
     * @return \Symfony\Component\HttpFoundation\RedirectResponse|\Symfony\Component\HttpFoundation\Response
     */
    public function updateAction($id)
    {
        $service = $this->getApplicationService();
        $entity = $service->findApplicationById($id);

        if (!$entity) {
            throw $this->createNotFoundException('Unable to find Application entity.');
        }

        $editForm   = $this->createForm(new ApplicationType(), $entity);
        $deleteForm = $this->createDeleteForm($id);

        $request = $this->getRequest();

        $editForm->bindRequest($request);

        if ($editForm->isValid()) {
            $service->save($entity);

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
     * @param $id
     * @throws #M#C\SarSport\Bundle\ApplicationBundle\Controller\ApplicationController.createNotFoundException|?
     * @return \Symfony\Component\HttpFoundation\RedirectResponse
     */
    public function deleteAction($id)
    {
        $form = $this->createDeleteForm($id);
        $request = $this->getRequest();

        $form->bindRequest($request);

        if ($form->isValid()) {
            $service = $this->getApplicationService();
            $entity = $service->findApplicationById($id);

            if (!$entity) {
                throw $this->createNotFoundException('Unable to find Application entity.');
            }
            $competition = $entity->getCompetition();
            $service->remove($entity);
        }

        return $this->redirect($this->generateUrl('application_by_competition', array('competition' => $competition)));
    }

    /**
     * @param $id
     * @return \Symfony\Component\Form\Form
     */
    private function createDeleteForm($id)
    {
        return $this->createFormBuilder(array('id' => $id))
            ->add('id', 'hidden')
            ->getForm()
        ;
    }

    /**
     * @return ApplicationService
     */
    private function getApplicationService()
    {
        return $this->container->get('sarsport_application.service.application');
    }

    /**
     * @return ApplicationExtension
     */
    private function getTwigExtension()
    {
        return $this->container->get('sarsport_application.twig.application_extension');
    }

    /**
     * @return ExcelWriter
     */
    private function getExcelWriterService()
    {
        return $this->container->get('sarsport_application.service.excel_writer');
    }

    private function getTranslator()
    {
        return $this->get('translator');
    }

    /**
     * Filling default data
     *
     * @param ApplicationInterface $application
     */
    private function fillDefaultData(ApplicationInterface $application)
    {
        $securityContext = $this->container->get('security.context');
        /** @var User $user */
        $user = $securityContext->getToken()->getUser();
        if ($user instanceof User) {
            $application->setFirstPlayerBirthday($user->getBirthday()->format('Y'));
            $application->setFirstPlayerFirstName($user->getFirstName());
            $application->setFirstPlayerLastName($user->getLastName());
            $application->setFirstPlayerSex($user->getSex());
        }
    }
}
