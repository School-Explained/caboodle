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

    /**
     * Get all of the items in the collection.
     *
     * @return array
     */
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

    /**
     * Run a map over each of the items.
     *
     * @param  callable | string  $callback
     * @return static
     */
    public function map($callback)
    {
        $keys = array_keys($this->items);
        $items = array_map($this->getCallbackFunc($callback), $this->items, $keys);
        return new static(array_combine($keys, $items));
    }

    

    /**
     * Collapse the collection of items into a single array.
     *
     * @return static
     */
    public function collapse()
    {
        return new static(ArrayHelper::collapse($this->items));
    }


    /**
     * Convert an array to a separated string list
     * Example: [ 1, 2, 3, 4 ] => "1,2,3,4"
     *
     * @param string $delimiter
     * @return string
     */
    public function join($delimiter = ',')
    {
        return implode($delimiter, $this->items);
    }


    /**
     * Return a function from a string.
     *
     * @param  callable | string  $callback
     * @return callable
     */
    private function getCallbackFunc($callback)
    {
        if (is_string($callback)) {
            $callback = function ($row) use ($callback) {
                return $row[$callback];
            };
        }
        return $callback;
    }
}
