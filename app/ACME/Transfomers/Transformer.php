<?php

namespace ACME\Transformers;


abstract class Transformer {

    /**
     * Transforms a collection of lessons to an array
     *
     * @param array $items
     * @return array
     * @internal param $lessons
     */
    public function transformCollection(array $items)
    {
        /*Instead of passing an anonymous function we are now telling it to us a function called transform
        and were passing each lesson to this.transform*/

        /*Not sure why this array method call works. But kind of cool but confusing Use call back functions instead
                    function ($lesson)
                    {
                        return $this->transform($lesson);
                    }
        */
        return array_map([$this, 'transform'], $items);
    }

    public abstract function transform($item);

}