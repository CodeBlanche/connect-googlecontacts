<?php

namespace Connect\Entity;

use Connect\Entity\Abstraction\ClearableEntity;
use Connect\Entity\Collection\ListMapGroups;
use Iterator\ArrayIterator;
use Iterator\LinkedKeyIterator;
use Iterator\MultiLinkedKeyIterator;

class ListMap extends ClearableEntity
{
    /**
     * @var \Iterator\LinkedKeyIterator Google group title => Google group id
     */
    public $groupTitles;

    /**
     * @var \Iterator\LinkedKeyIterator Laposta group id => Google group id
     */
    public $groups;

    /**
     * @var \Connect\Entity\Collection\ListMapGroups Laposta group id => ListMapGroup instance
     */
    public $groupElements;

    /**
     * @var \Iterator\MultiLinkedKeyIterator Laposta hook id => Laposta group id
     */
    public $hooks;

    /**
     * @var \Iterator\LinkedKeyIterator Laposta field tags => internal field id
     */
    public $tags;

    /**
     * @param string $name
     * @param mixed  $value
     *
     * @return $this
     */
    public function set($name, $value)
    {
        if (!is_traversable($value)) {
            $value = array();
        }

        if ($name === 'groupTitles' && !($value instanceof LinkedKeyIterator)) {
            $value = new LinkedKeyIterator($value);
        }

        if ($name === 'groups' && !($value instanceof LinkedKeyIterator)) {
            $value = new LinkedKeyIterator($value);
        }

        if ($name === 'groupElements' && !($value instanceof ListMapGroups)) {
            $value = new ListMapGroups($value);
        }

        if ($name === 'hooks' && !($value instanceof MultiLinkedKeyIterator)) {
            $value = new MultiLinkedKeyIterator($value);
        }

        if ($name === 'tags' && !($value instanceof LinkedKeyIterator)) {
            $value = new LinkedKeyIterator($value);
        }

        return parent::set($name, $value);
    }
}
