<?php
namespace src\TransportType;

/**
 * Class Train
 *
 * @package src\TransportType
 */
class Train extends TransportTypeAbstrait
{

    /**
     * @var string
     */
    protected $transportId;

    /**
     * @var string
     */
    protected $siege;

    const MESSAGE = 'Prenez le train %s';
    const DE_A = ' De %s A %s. ';
    const SIEGE = 'Asseyez-vous au siège %s.';

    /**
     * Returne un message pour le trajet, definit dans TransportTypeInterface
     *
     * @return string
     */
    public function getMessage()
    {
        // Preciser le numero de TransportType
        $message = sprintf(static::MESSAGE, $this->transportId);

        // Preciser d'où à où
        $message = sprintf( $message . static::DE_A, $this->depart, $this->destination );

        // preciser le siege
        $message = sprintf($message . static::SIEGE, $this->siege);

        return $message;
    }
}
 ?>
