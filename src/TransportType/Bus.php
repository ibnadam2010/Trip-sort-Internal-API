<?php
namespace src\TransportType;

/**
 * Class Bus
 *
 * @package src\TransportType
 */
class Bus extends TransportTypeAbstrait
{

    const MESSAGE = 'Prenez le bus de l\'aéroport';
    const SANS_SIEGE = ' Pas de siège définit.';
    const DE_A = ' De %s A %s. ';

    /**
     * Retourne toutes les infos sur un trajet, avec le type de transport Bus
     *
     * @return string
     */
    public function getMessage()
    {

      //preciser d'où à où
        $message = sprintf( static::MESSAGE . static::DE_A, $this->depart, $this->destination );
        //preciser que ce trajet est sans siege specifique
        $message .= static::SANS_SIEGE;

        return $message;
    }
}

 ?>
