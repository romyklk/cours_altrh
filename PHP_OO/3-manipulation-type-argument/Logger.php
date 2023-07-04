<?php 

/* 
L'injection de dépendance est une technique qui consiste à passer un objet en paramètre d'une méthode plutôt que de l'instancier dans la méthode.

Cela permet de rendre le code plus souple et plus facilement testable.

Le principe derrière l'injection de dépendance est de séparer la création d'un objet de son utilisation.

*/

// Création d'une classe Logger qui permettra de gérer les logs de notre application
class Logger 
{
    public function log($message)
    {
        echo "$message <br>";
    }
}

class UserService 
{
    
    private $logger;

    // On injecte l'objet Logger dans le constructeur de UserService. Donc lors de l'instanciation de UserService, on doit passer un objet Logger en paramètre
    public function __construct(Logger $logger)
    {
        $this->logger = $logger;
    }


    public function register($user)
    {
        $this->logger->log("L'utilisateur $user a été enregistré");
    }
}

$logger = new Logger();

$service = new UserService($logger);

$service->register("John Doe");