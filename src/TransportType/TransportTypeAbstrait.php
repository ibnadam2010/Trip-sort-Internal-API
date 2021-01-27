<?php
namespace src\TransportType;



/**
 * Class AbstractTransportation
 *
 * @package src\Transportation
 */
abstract class TransportTypeAbstrait implements TransportTypeInterface
{

    /**
     * @var string
     */
    protected $depart;

    /**
     * @var string
     */
    protected $destination;

    const MESSAGE_DESTINATION_FINALE = 'Vous êtes arrivé à destination !.';

    /**
     * @param array $trajet
     */
    public function __construct(array $trajet)
    {
        foreach ($trajet as $key => $value) {
            $property = lcfirst($key);

            if (property_exists($this, $property)) {
                $this->{$property} = $value;
            }
        }
    }

}

 ?>
