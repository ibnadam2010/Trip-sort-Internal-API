<?php
namespace src;

/**
 * Class TrieurEmbarquement
 *
 * @package src
 */
class TrieurEmbarquement
{
    /**
     * Embarquements
     *
     * @var array
     */
    protected $embarquements = array();

    function __construct($embarquements)
    {
        $this->embarquements = $embarquements;
    }

    /**
     * Trier embarquements
     * Une fonction pour trier tous les embarquements
     */
    public function trier()
    {
        // afficher le premier et le dernier trajet
        $this->afficherPremierDernierEmbarquement();

        // associer les embarquements
        for ($i=0, $max = count($this->embarquements) -1 ; $i < $max ; $i++) {
            // Pour chaque trajet tester la ville destination et la ville départ
            foreach ($this->embarquements as $idx => $trajet) {
                // echo $this->embarquements[$i]['Destination'];
                // echo $trajet['Depart'];
                if (strcasecmp($this->embarquements[$i]['Destination'], $trajet['Depart']) == 0) {
                    $nextIdx = $i + 1;
                    $tempEmbarquement = $this->embarquements[$nextIdx];
                    $this->embarquements[$nextIdx] = $trajet;
                    $this->embarquements[$idx] = $tempEmbarquement;
                }
            }
        }
    }

    private function afficherPremierDernierEmbarquement()
    {
        $isLastEmbarquement = true;
        $hasPrevEmbarquement = false;

        for ($i=0, $max = count($this->embarquements); $i < $max ; $i++) {
            //Pour chaque trajet tester la ville destination et celle de depart
            foreach ($this->embarquements as $trajet) {
                // Si le depart du trajet encours fut la destination d'un autre trajet alors il eut un voyage précédent
                if (strcasecmp($this->embarquements[$i]['Depart'], $trajet['Destination']) == 0) {
                    $hasPrevEmbarquement = true;
                }
                // Si la destination du trajet encours représente un autre depart alors on n'est pas à la fin du trajet
                elseif (strcasecmp($this->embarquements[$i]['Destination'], $trajet['Depart']) == 0) {
                    $isLastEmbarquement = false;
                }
            }

            // Préciser le dernier et le premier trajet
            if (!$hasPrevEmbarquement) {
                // Si pas embarquements précedent alors c'est le premier trajet, on le met au sommet du tableau
                array_unshift($this->embarquements, $this->embarquements[$i]);
                unset($this->embarquements[$i]);
            }
            elseif ($isLastEmbarquement) {
                // Si $isLastEmbarquement est vrai, le trajet encours est le dernier, le mettre au fond du tableau
                array_push($this->embarquements, $this->embarquements[$i]);
                unset($this->embarquements[$i]);
            }
        }

        // reconstruction des indices du tableau
        $this->embarquements = array_merge($this->embarquements);
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
}

 ?>
