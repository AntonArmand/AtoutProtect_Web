<?php
include_once '../inc/functions.php';
include_once '../models/dao/clientDAO.php';
include_once '../models/clientModel.php';

$register   = isset($_POST['register']) ? $_POST['register'] : '';
$save       = isset($_POST['save']) ? $_POST['save'] : '';
$login       = isset($_POST['login']) ? $_POST['login'] : '';

$date       = new DateTime();
$date       = $date->format('Y-m-d H:i:s');
session_start();


if($register)
{
    $mailClient = isset($_POST['mailClient']) ? $_POST['mailClient'] : '';
    $mdpClient  = isset($_POST['mdpClient']) ? $_POST['mdpClient'] : '';
    $nomClient  = isset($_POST['nomClient']) ? $_POST['nomClient'] : '';
    $prenomClient  = isset($_POST['prenomClient']) ? $_POST['prenomClient'] : '';

    $array = array("nomClient" => $nomClient,
                        "prenomClient" => $prenomClient,
                        "mailClient" => $mailClient,
                        "dateInscriptionClient" => $date,
                        "mdpClient" => hashage($mdpClient));

    $clientDAO = new ClientDAO();
    if($clientDAO->findByEmailOnly($mailClient) != null)
    {
        echo "Utilisateur déjà inscrit";
        return;
    }
    else
    {
        $clientDAO->insertClient($nomClient, $prenomClient, $mailClient, $mdpClient, $date);
        $client = new Client($array);

        $_SESSION['idClient'] = $client->getIdClient();
        $_SESSION['nomClient'] = $client->getNomClient();
        $_SESSION['prenomClient'] = $client->getPrenomClient();
        $_SESSION['mailClient'] = $client->getMailClient();
        $_SESSION['dateInscriptionClient'] = $client->getDateInscriptionClient();
        $_SESSION['dateModificationClient'] = $client->getDateModificationClient();

        header('Location: ../../index.php');
    }

}

else if($save)
{    
    $newMdpClient        = isset($_POST['newMdpClient']) ? $_POST['newMdpClient'] : '';
    $newMdpClientConfirm = isset($_POST['newMdpClientConfirm']) ? $_POST['newMdpClientConfirm'] : '';
    $mdpClient           = isset($_POST['mdpClient']) ? $_POST['mdpClient'] : '';

    $mailClient = isset($_POST['mailClient']) ? $_POST['mailClient'] : '';
    
    if($newMdpClient != $newMdpClientConfirm)
    {
        echo "Nouveau mot de passe ne correspond pas avec la confirmation";
    }
    else
    {
        $clientDAO = new ClientDAO();
        $client = $clientDAO->findByIdClient($_SESSION['idClient']);
        $clientDAO = new ClientDAO();
        $clientDAO->updateClient($client->getIdClient(), $client->getNomClient(), $client->getPrenomClient(), $client->getMailClient(), $newMdpClient, $newMdpClientConfirm);
    }
}

else if($login)
{
    $mailClient = isset($_POST['mailClient']) ? $_POST['mailClient'] : '';
    $mdpClient  = isset($_POST['mdpClient']) ? $_POST['mdpClient'] : '';

    $clientDAO  = new ClientDAO();
    $client     = $clientDAO->findByEmail($mailClient, $mdpClient);
    if($client->getIdClient() < 1)
    {
        echo('Mot de passe incorect');
        return;
    }
    else
    {
        $_SESSION['idClient'] = $client->getIdClient();
        $_SESSION['nomClient'] = $client->getNomClient();
        $_SESSION['prenomClient'] = $client->getPrenomClient();
        $_SESSION['mailClient'] = $client->getMailClient();
        $_SESSION['dateInscriptionClient'] = $client->getDateInscriptionClient();
        $_SESSION['dateModificationClient'] = $client->getDateModificationClient();
        header('Location: ../../index.php');

    }
}