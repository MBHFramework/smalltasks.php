<?php namespace SmallTasks;

/**
 * AbstractProcessorTask
 * 
 */
abstract class AbstractProcessorTask 
{
    /*
     * handle
     * 
     * @param mixed | object $elem
     * @return object
     */
    abstract public function handle($elem);
}
