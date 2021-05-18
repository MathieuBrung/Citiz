<?php

    abstract class FormPricesSimulation
    {
        static function formCreation($dateStart, $dateEnd)
        {
            // $vehiclesCategories = VehicleDAO::getVehiclesCategories(); // Récupération des catégories de véhicule
            // Faire une boucle pour les div du choix de voiture mais voir pour la meilleure méthode pour les avoirs dans le bon ordre
            $form = "<form action='index.php' method='post' class=''>
                        <fieldset>
                            <legend>Choix du véhicule</legend>
                            <div>
                                <img src='public/img/S.png' alt='S'><br>
                                <label for='vehicle'>S</label>
                                <input type='radio' id='vehicle' name='vehicle' value='S'>
                            </div>
                            
                            <div>
                                <img src='public/img/M.png' alt='M'><br>
                                <label for='vehicle'>M</label>
                                <input type='radio' id='vehicle' name='vehicle' value='M' checked>
                            </div>
                            
                            <div>
                                <img src='public/img/L.png' alt='L'><br>
                                <label for='vehicle'>L</label>
                                <input type='radio' id='vehicle' name='vehicle' value='L'>
                            </div>
                            
                            <div>
                                <img src='public/img/XL.png' alt='XL'><br>
                                <label for='vehicle'>XL</label>
                                <input type='radio' id='vehicle' name='vehicle' value='XL'>
                            </div>
                            
                            <div>
                                <img src='public/img/XXL.png' alt='XXL'><br>
                                <label for='vehicle'>XXL</label>
                                <input type='radio' id='vehicle' name='vehicle' value='XXL'>
                            </div>
                        </fieldset><br>

                        <fieldset>
                            <legend>Durée de location</legend>
                            <label for='dateStart'>Départ</label>
                            <input type='datetime-local' name='dateStart' id='dateStart' value='" . $dateStart . "'><br><br>
                            <label for='dateEnd'>Retour</label>
                            <input type='datetime-local' name='dateEnd' id='dateEnd' value='" . $dateEnd . "'>
                        </fieldset><br>

                        <fieldset>
                            <legend>Distance (km)</legend>
                            <input type='number' name='distance' id='distance' min='1' value='1'>
                        </fieldset><br>

                        <input type='hidden' name='formName' value='pricesSimulation'>
                        <span class='' id='errorMessagePricesSimulation'></span><br>
                        <input type='submit' value='Je calcule' class='' id='submitPricesSimulation' onsubmit='controlPricesSimulationForm()'>
                    </form>";
                    
            return $form;
        }

        static function formController($vehiclesCategory, $dateStart, $distance)
        {
            if(ControlPricesSimulation::controlVehicle($vehiclesCategory))
            {
                if(ControlPricesSimulation::controlDate($dateStart))
                {
                    if(ControlPricesSimulation::controlDistance($distance))
                    {
                        return true;
                    }
                    else
                    {
                        $error = 'Erreur : La distance de réservation maximum est de 1 000 km.';
                    }
                }
                else
                {
                    $error = 'Erreur : La date de réservation ne peut pas être antérieure à la date du jour.';
                }
            }
            else
            {
                $error = 'Erreur : Les catégories de véhicule possible sont S, M, L, XL et XXL.';
            }
            return $error;
        }
    }