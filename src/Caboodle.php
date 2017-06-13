<?php

/**
 * Main file for the official Caboodle Library of School Explained
 *
 * PHP version 5
 *
 * @category  PHP
 * @package   Caboodle
 * @author    David Floegel <davidf@learningladders.info>
 * @license   https://github.com/School-Explained/caboodle/blob/master/LICENSE
 * @link      https://github.com/School-Explained/caboodle
 */

namespace SchoolExplained;

class Caboodle
{
    protected $items = [];

    /**
     * Create a new collection.
     *
     * @param  mixed  $items
     * @return void
     */
    public function __construct($items = array())
    {
        $items = is_null($items) ? [] : $items;

        $this->items = (array) $items;
    }

    /**
     * Initialise a new collection
     *
     * @param  array      $items
     * @return Collection
     */
    public static function make($items = null)
    {
        return new static($items);
    }

    public function all()
    {
        return $this->items;
    }

    /**
     * Get the collection of items as a plain array.
     *
     * @return array
     */
    public function toArray()
    {
        return array_map(function ($value) {
            return $value instanceof Arrayable ? $value->toArray() : $value;
        }, $this->items);
    }
}
