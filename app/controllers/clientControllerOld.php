<?php
include_once '../inc/functions.php';
include_once '../models/dao/clientDAO.php';
include_once '../models/clientModel.php';

$register   = isset($_POST['register']) ? $_POST['register'] : '';
$save       = isset($_POST['save']) ? $_POST['save'] : '';
$login       = isset($_POST['login']) ? $_POST['login'] : '';

$date       = new DateTime();
$date       = $date->format('Y-m-d H:i:s');

if($register)
{
    $mailClient    = isset($_POST['mailClient']) ? $_POST['mailClient'] : '';
    $mdpClient     = isset($_POST['mdpClient']) ? $_POST['mdpClient'] : '';
    $nomClient     = isset($_POST['nomClient']) ? $_POST['nomClient'] : '';
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
        $client = $clientDAO->findByEmail($mailClient, hashage($mdpClient));

        $_SESSION['idClient'] = $client->getIdClient();
        $_SESSION['nomClient'] = $client->getNomClient();
        $_SESSION['prenomClient'] = $client->getPrenomClient();
        $_SESSION['mailClient'] = $client->getMailClient();
        $_SESSION['dateInscriptionClient'] = $client->getDateInscriptionClient();
        $_SESSION['dateModificationClient'] = $client->getDateModificationClient();

        header('Location: index.php');
    }
}

else if($save)
{    
    $nomClient           = isset($_POST['nomClient']) ? $_POST['nomClient'] : '';
    $prenomClient        = isset($_POST['prenomClient']) ? $_POST['prenomClient'] : '';
    $newMdpClient        = isset($_POST['newMdpClient']) ? $_POST['newMdpClient'] : '';
    $newMdpClientConfirm = isset($_POST['newMdpClientConfirm']) ? $_POST['newMdpClientConfirm'] : '';
    $mdpClient           = isset($_POST['mdpClient']) ? $_POST['mdpClient'] : '';
    $mailClient          = isset($_POST['mailClient']) ? $_POST['mailClient'] : '';
    
    if($newMdpClient != $newMdpClientConfirm)
    {
        echo "Nouveau mot de passe ne correspond pas avec la confirmation";
    }
    else
    {
        $clientDAO = new ClientDAO();
        $_SESSION['idClient'] = 2;
        $client = $clientDAO->findByIdClient($_SESSION['idClient']);
        if($client->getMdpClient() == hashage($mdpClient))
        {
            $clientDAO->updateClient($client->getIdClient(), $nomClient, 
                $prenomClient, $mailClient, hashage($newMdpClient));
            $client = $clientDAO->findByIdClient($_SESSION['idClient']);
            $_SESSION['idClient'] = $client->getIdClient();
            $_SESSION['nomClient'] = $client->getNomClient();
            $_SESSION['prenomClient'] = $client->getPrenomClient();
            $_SESSION['mailClient'] = $client->getMailClient();
            $_SESSION['dateInscriptionClient'] = $client->getDateInscriptionClient();
            $_SESSION['dateModificationClient'] = $client->getDateModificationClient();

        }
        else
        {
            echo "Mot de passe incorrect";
        }

    }
}

else if($login)
{
    $mailClient = isset($_POST['mailClient']) ? $_POST['mailClient'] : '';
    $mdpClient  = isset($_POST['mdpClient']) ? $_POST['mdpClient'] : '';

    if(!$mailClient || !$mdpClient) {
        header('Location: index.php');
        exit;
    } else {
        $clientDAO  = new ClientDAO();
        $client     = $clientDAO->findByEmail($mailClient, hashage($mdpClient));

        if($client->getIdClient() >= 1) {
            $_SESSION['idClient'] = $client->getIdClient();
            $_SESSION['nomClient'] = $client->getNomClient();
            $_SESSION['prenomClient'] = $client->getPrenomClient();
            $_SESSION['mailClient'] = $client->getMailClient();
            $_SESSION['dateInscriptionClient'] = $client->getDateInscriptionClient();
            $_SESSION['dateModificationClient'] = $client->getDateModificationClient();
            
            echo('OKAY');
            return;
        } else {
            echo('Mot de passe incorect');
            header('Location: login.php');
            return;
        }

    }
}
