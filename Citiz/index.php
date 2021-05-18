<?php
    session_start();
    
    try
    {       
        if(isset($_SESSION['connect']) && $_SESSION['connect'] == true)
        {
            switch ($_SESSION['userType'])
            {
                case 'Utilisateur':
                    require ('indexUser.php');
                break;

                case 'Abonné':
                    require ('indexSubscriber.php');
                break;

                case 'Secrétaire':
                    require ('indexSecretary.php');
                break;

                case 'Responsable':
                    require ('indexManager.php');
                break;
                
                default:
                    require ('indexVisitor.php');
                break;
            }
        }
        else
        {
            require ('indexVisitor.php');
        }
    }
    catch (Exception $e)
    {
        $errorMessage = $e->getMessage();
        require('views/errorview.php');
    }
