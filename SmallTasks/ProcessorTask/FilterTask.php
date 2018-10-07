<?php namespace SmallTasks\ProcessorTask;

use SmallTasks\AbstractProcessorTask;
use SmallTasks\ProcessorNullTask;
use SmallTasks\ProcessorTask;

/**
 * ProcessorTask
 * 
 */
class FilterTask extends ProcessorTask
{  
    private $criteria;

    public function __constructor(callable $criteria = null) {
        $this->setCriteria($criteria);
    }

    public function satisfyCriteria($elem) {
        return call_user_func($this->getCriteria(), $elem);
    }

    /*
     * @inheritDoc
     */
    public function nextFor($elem): AbstractProcessorTask {
        if (!$this->satisfyCriteria($elem)) {
            return new ProcessorNullTask;
        }

        return $this->getSuccessor();
    }

    /*
     * @inheritDoc
     */
    public function run($elem) {
        return $elem;
    }

    public function getCriteria(): callable {
        return $this->criteria;
    }

    public function setCriteria(callable $criteria = null) {
        if (!$criteria)
            $criteria = function($elem) {
                return $elem;
            };

        $this->criteria = $criteria;
    }
}
