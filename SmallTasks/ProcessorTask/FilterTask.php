<?php namespace SmallTasks\ProcessorTask;

use ProcessorTask;

/**
 * ProcessorTask
 * 
 * @package smalltasks
 */
class FilterTask extends ProcessorTask
{  
    /*
     * @inheritDoc
     */
    public function run($elem) {
        return $this;
    }
}
