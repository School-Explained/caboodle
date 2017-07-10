<?php

/**
 * Helpers file for the official Caboodle Library of School Explained
 *
 * PHP version 5
 *
 * @category  PHP
 * @package   Caboodle
 * @author    Davide Crestini <davidec@learningladders.info>
 * @license   https://github.com/School-Explained/caboodle/blob/master/LICENSE
 * @link      https://github.com/School-Explained/caboodle
 */

namespace SchoolExplained;

class ArrayHelper
{
    /**
     * Collapse an array of arrays into a single array.
     *
     * @param  array|\ArrayAccess  $array
     * @return array
     */
    public static function collapse($array)
    {
        $results = [];

        foreach ($array as $values)
        {
            if ($values instanceof Collection) $values = $values->all();

            $results = array_merge($results, $values);
        }

        return $results;
    }

}



