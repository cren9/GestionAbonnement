<?php

namespace GestionBundle\Controller;

use GestionBundle\Entity\Abonnements;
use GestionBundle\Form\AbonnementsType;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Symfony\Component\HttpFoundation\Request;

class AbonnementsController extends Controller
{
    public function AjouterABAction(Request $request)
    {
        $ab = new Abonnements();
        $form = $this->createForm(AbonnementsType::class,$ab);
        $form->handleRequest($request);

       if($form->isSubmitted() && $form->isValid())
        {
            $em = $this->getDoctrine()->getManager();
            $ab->setDate(new \DateTime('now'));
            $em->persist($ab);
            $em->flush();
            return $this->redirectToRoute('Afficher_Repas');
        }
        return $this->render('@Gestion/Abonnements/AjoutAB.html.twig',array('form'=>$form->createView()));
    }

    public function listeABAction(Request $request)
    {
        $id=$request->get('id');
        $em=$this->getDoctrine()->getManager();
        $Ab=$em->getRepository('GestionBundle:Abonnements')->findAll();
        return $this->render('@Gestion/Abonnements/listAB.html.twig',array('Abonnement'=> $Ab));
    }

    public function SupprimerABAction(Request $request)
    {
        $id= $request->get('id');
        $em=$this->getDoctrine()->getManager();
        $Ab=$em->getRepository('GestionBundle:Abonnements')->find($id);
        $em->remove($Ab);
        $em->flush();
        return $this->redirectToRoute('Liste_Abonnements');
    }

    public function ModifierABAction(Request $request , $id)
    {
        $em= $this->getDoctrine()->getManager(); // 1  création d'un manager
        $Ab = $em->getRepository('GestionBundle:Abonnements')->find($id); // 2 création du CRUD
        $Ab->setType($Ab->getType()); // 3 préparation des champs au modifier
        $Ab->setPrix($Ab->getPrix());
        $form=$this->createForm(AbonnementsType::class , $Ab); // 4 création d'un formulaire = EtudiantType
        $form->handleRequest($request);

        //5 si le formulaire est cliqué

        if($form->isSubmitted() && $form->isValid()){

            $type=$form['type']->getData();
            $prix=$form['prix']->getData();
            //création d'un entityManager

            $em=$this->getDoctrine()->getManager();
            $Ab=$em->getRepository('GestionBundle:Abonnements')->find($id);
            $Ab->setType($type);
            $Ab->setPrix($prix);
            $em->flush();

            return $this->redirectToRoute('Liste_Abonnements');

        }

        return $this->render('@Gestion/Abonnements/AjoutAB.html.twig', array('form' => $form->createView()));
    }
}
