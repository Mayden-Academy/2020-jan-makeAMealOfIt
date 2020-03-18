<?php

namespace Mamoi\Entities;

class RecipeEntity
{
    private $title;
    private $href;
    private $ingredients;
    private $thumbnail;

    public function __construct(string $title, string $href, string $ingredients, string $img)
    {
        $this->title = $title;
        $this->href = $href;
        $this->ingredients = $ingredients;
        $this->thumbnail = $img;
    }

    /** Getter for recipe title
     *
     * @return string
     */
    public function getTitle() : string
    {
        return $this->title;
    }

    /** Getter for recipe link
     *
     * @return string
     */
    public function getHref() : string
    {
        return $this->href;
    }

    /** Getter for recipe ingredients
     *
     * @return string
     */
    public function getIngredients() : string
    {
        return $this->ingredients;
    }

    /** Getter for recipe img
     *
     * @return string
     */
    public function getThumbnail() : string {
        return $this->thumbnail;
    }
}
