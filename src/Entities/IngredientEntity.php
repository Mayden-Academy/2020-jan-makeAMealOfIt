<?php


namespace Mamoi\Entities;


class IngredientEntity
{
    private $id;
    private $name;

    /** Getter for id
     *
     * @return mixed
     */
    public function getId()
    {
        return $this->id;
    }

    /** Getter for name
     *
     * @return mixed
     */
    public function getName()
    {
        return $this->name;
    }

}