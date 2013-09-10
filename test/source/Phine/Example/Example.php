<?php

namespace Phine\Example;

use ArrayIterator;
use DateTime;
use Phine\Example\Exception\ExampleException;

/**
 * This is an example class that fills in the blanks left by `AbstractExample`.
 *
 * @author Kevin Herrera <kevin@herrera.io>
 */
class Example extends AbstractExample
{
    /**
     * The arguments provided.
     *
     * @var array
     */
    private $args = array(null, null, null);

    /**
     * {@inheritDoc}
     */
    public function count()
    {
        return 123;
    }

    /**
     * {@inheritDoc}
     */
    final public static function create()
    {
        return new self();
    }

    /**
     * {@inheritDoc}
     */
    public function getArgs()
    {
        return $this->args;
    }

    /**
     * {@inheritDoc}
     */
    public function getIterator()
    {
        return new ArrayIterator(array());
    }

    /**
     * {@inheritDoc}
     */
    public function setArgs($boolean, $integer, $string)
    {
        $this->args = array($boolean, $integer, $string);
    }

    /**
     * {@inheritDoc}
     */
    protected function doSetCreatedDate($created)
    {
        if (is_integer($created)) {
            $created = new DateTime("@$created");
        } elseif (!($created instanceof DateTime)) {
            throw new ExampleException(
                '$created must be an integer or instance of DateTime.'
            );
        }

        $this->created = $created;
    }
}