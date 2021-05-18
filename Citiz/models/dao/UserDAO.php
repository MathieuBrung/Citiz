<?php
// Attention, le type de connexion à la base de données n'est pas encore géré
// Par défaut on se connecte en admin

    abstract class UserDAO
    {
        // Ajouter le type d'utilisateur en paramètre ?
        static function getUsers()
        {
            $users = [];

            // Récupération du type dans les paramètres ?
            // Paramètre 'Admin' provisoire, il faudra le passer à 'Visitor' lorsque les comptes de la bdd seront créés
            $req = DBConnexion::getConnexion('Visitor')->query('SELECT UserEmail, UserLastName, UserFirstName, UserPhoneNumber, UTCode FROM user');

            while($data = $req->fetch(PDO::FETCH_ASSOC))
            {
                $users[] = new User($data);
            }

            return $users;
        }

        static function getUserByEmail($userEmail)
        {
            // Paramètre 'Admin' provisoire, il faudra le passer à 'Visitor' lorsque les comptes de la bdd seront créés
            $req = DBConnexion::getConnexion('Visitor')->prepare('SELECT UserLastName, UserFirstName, UserPhoneNumber, UTName FROM user NATURAL JOIN user_type WHERE UserEmail = :UserEmail');
            $req->bindValue(':UserEmail', $userEmail);
            $req->execute();
            $data = $req->fetch(PDO::FETCH_ASSOC);

            return new User($data);
        }

        static function getUserTypeByEmail($userEmail)
        {
            // Paramètre 'Admin' provisoire, il faudra le passer à 'Visitor' lorsque les comptes de la bdd seront créés
            $req = DBConnexion::getConnexion('Visitor')->prepare('SELECT UTCode, UTName FROM user NATURAL JOIN user_type WHERE UserEmail = :UserEmail');
            $req->bindValue(':UserEmail', $userEmail);
            $req->execute();
            $data = $req->fetch(PDO::FETCH_ASSOC);

            return new UserType($data);
        }

        static function addUser(User $user)
        {
            // Ajout de la vérification du type d'utilisateur ?
            $req = DBConnexion::getConnexion('Admin')->prepare('INSERT INTO user(UserEmail, UserLastName, UserFirstName, UserPhoneNumber, UserPassword, UTCode) 
                                                                VALUES (:UserEmail, :UserLastName, :UserFirstName, :UserPhoneNumber, :UserPassword, :UTCode)');
            
            $userEmail = $user->getUserEmail();
            $userLastName = $user->getUserLastName();
            $userFirstName = $user->getUserFirstName();
            $userPhoneNumber = $user->getUserPhoneNumber();
            $userPassword = $user->getUserPassword();
            $UTCode = $user->getUTCode();

            $req->bindValue(':UserEmail', $userEmail);
            $req->bindValue(':UserLastName', $userLastName);
            $req->bindValue(':UserFirstName', $userFirstName);
            $req->bindValue(':UserPhoneNumber', $userPhoneNumber);
            $req->bindValue(':UserPassword', md5($userPassword));
            $req->bindValue(':UTCode', $UTCode);
            
            return $req->execute();
        }

        static function addDirectory($path)
        {
            // si $path n'existe pas dans la bdd
            // alors on le créer
            return true;
        }

        static function userExist($UserEmail, $UserPassword)
        {
            // Paramètre 'Admin' provisoire, il faudra le passer à 'Visitor' lorsque les comptes de la bdd seront créés
            $req = DBConnexion::getConnexion('Visitor')->prepare('SELECT UserEmail FROM user WHERE UserEmail = :UserEmail AND UserPassword = md5(:UserPassword)');

            $req->bindValue(":UserEmail", $UserEmail);
            $req->bindValue(":UserPassword" ,  $UserPassword);

            return $req->execute();
        }

    }