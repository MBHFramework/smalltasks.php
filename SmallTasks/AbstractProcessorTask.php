<?php namespace SmallTasks;

/**
 * AbstractProcessorTask
 * 
 * @package smalltasks
 * @author Ulises Jeremias Cornejo Fandos <ulisescf.24@gmail.com>
 * @author Federico Ramon Gasquez <federicogasquez@gmail.com>
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
