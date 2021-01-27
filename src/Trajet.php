<?php
namespace src;

/**
 * Class Trajet
 *
 * @package src
 */
class Trajet
{
    /**
     * Embarquements
     *
     * @var array
     */
    protected $embarquements = array();

    /**
     * Trier cartes Embarquements
     *
     * @var array
     */
    protected $embarquementsTriee = array();

    /**
     * Type de transport par defaut
     *
     * @var array
     */
    protected static $transportTypes = array(
        'Train' => 'src\TransportType\Train',
        'Bus' => 'src\TransportType\Bus',
        'Avion' => 'src\TransportType\Avion',
    );

    function __construct($embarquements)
    {
        $this->embarquements = $embarquements;
    }

    public function AjouterEmbarquement($embarquement)
    {
        $this->embarquements[] = $embarquement;
    }

    /**
     * trier embarquements
     * Cette fonction fait le tri des cartes
     */
    public function trier()
    {
        // creer une instance de trieur d'embarquement pour trier les données
        $trieurEmbarquement = new TrieurEmbarquement($this->embarquements);
        // trier les embarquements et les placés dans le nouveau tableau embarquementsTriee
        $trieurEmbarquement->trier();
        $this->embarquementsTriee = $trieurEmbarquement->getEmbarquements();
    }

    /**
     * Get TransportType triee comme un tableau d'objet
     *
     * @return array
     */
    public function getTransportTypes()
    {
        $transportTypesList = array();

        if (count($this->embarquementsTriee) == 0) {
            return $transportTypesList;
        }

        foreach ($this->embarquementsTriee as $embarquement) {
            $type = $embarquement['TransportType'];

            if (!isset(static::$transportTypes[$type])){
                throw new Exception\RuntimeException(
                    sprintf(
                        'Type de transport non compris : %s',
                        $type
                    )
                );
            }
            $transportTypesList[] = new static::$transportTypes[$type]($embarquement);
        }

        return $transportTypesList;

    }

    /**
     * Afficher le trajet
     */
    public function trajetString()
    {
        foreach ($this->getTransportTypes() as $idx => $transport) {
             //var_dump($transport);
            echo ($idx+1) ."||=>" . " " . $transport->getMessage() ."<br><br>";
            // message arrivée destination finale
            if($idx == (count($this->embarquements) -1) ){
                echo "<span style='margin-left:40px'></span>" . " " . "<span style='color:yellow;font-weight:bold'>". $transport::MESSAGE_DESTINATION_FINALE ."</span>";
            }
        }

    }

    /**
     * Get embarquements
     *
     * @return array()
     */
    public function getEmbarquements()
    {
        return $this->embarquements;
    }

    /**
     * Get embarquements triee
     *
     * @return array()
     */
    public function getEmbarquementsTriee()
    {
        return $this->embarquementsTriee;
    }
}

 ?>
