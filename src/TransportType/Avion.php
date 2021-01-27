<?php
namespace src\TransportType;

/**
 * Class Avion
 *
 * @package src\TransportType
 */
class Avion extends TransportTypeAbstrait
{

    /**
     * @var string
     */
    protected $transportId;

    /**
     * @var string
     */
    protected $siege;

    /**
     * @var string
     */
    protected $porte;

    /**
     * @var string
     */
    protected $baggage;

    const MESSAGE = 'De %s, prenez le vol %s pour %s. Porte %s, siège %s.';
    const MESSAGE_GUICHET_BAGGAGE = 'Déposez vos baggages au guichet %s.';

    /**
     * Retourne un message pour le trajet, definit dans TransportTypeInterface
     *
     * @return string
     */
    public function getMessage()
    {
        $message = sprintf( static::MESSAGE, $this->depart, $this->transportId, $this->destination, $this->porte, $this->siege );

        // preciser le guichet de dépôt des baggages s'il y en a un
        if (!empty($this->baggage)){
            $message .= sprintf( '<br>'.'<span style="margin-left:37px">'.static::MESSAGE_GUICHET_BAGGAGE.'</span>', $this->baggage );

            return $message;
        }

        return $message;
    }
}



 ?>
