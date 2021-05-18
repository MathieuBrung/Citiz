<?php
    require ('library/autoLoader.php');
    
    try
    {       
        if(!empty($_POST))
        {
            if(isset($_POST['formName']))
            {
                $allowedFormName = ControlForms::controlFormsName();
                if(in_array($_POST['formName'], $allowedFormName))
                {
                    require (Dispatcher::dispatch($_POST['formName']));
                }
                else
                {
                    unset($_POST);
                    throw new Exception("Erreur : Mauvais nom de formulaire.");
                }
            }
            elseif(isset($_POST['buttonMenu']))
            {
                $allowedMenuElement = ControlMenu::controlElements();
                if(in_array($_POST['buttonMenu'], $allowedMenuElement))
                {
                    require (Dispatcher::dispatch($_POST['buttonMenu']));
                }
                else
                {
                    unset($_POST);
                    throw new Exception("Erreur : Mauvaise valeur dans le bouton.");
                }
            }
            elseif(isset($_POST['buttonStation']))
            {
                require (Dispatcher::dispatch('stationDetailView'));
            }
            elseif(isset($_POST['pricesSimulation']))
            {
                require (Dispatcher::dispatch('pricesSimulation'));
            }
            else
            {
                unset($_POST);
                require('controllers/controllerVisitorHomeView.php');
            }
        }
        elseif(isset($_SESSION['redirection']))
        {
            require (Dispatcher::dispatch($_SESSION['redirection']));
        }
        else
        {
            require('controllers/controllerVisitorHomeView.php');
        }
    }
    catch (Exception $e)
    {
        $errorMessage = $e->getMessage();
        require('views/errorview.php');
    }
