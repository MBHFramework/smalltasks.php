<?php namespace SmallTasks;

/**
 * ProcessorTask
 * 
 */
abstract class ProcessorTask extends AbstractProcessorTask
{
    private $successor;

    public function __construct() {
        $this->setSuccessor(new ProcessorNullTask);
    }
    
    /*
     * @inheritDoc
     */
    public function handle($elem) {
        $result = $this->run($elem);

        return $this->nextFor($elem)->handle($result);
    }

    public function add(AbstractProcessorTask $processorTask) {
        return $this->getSuccessor()->add($processorTask);
    }

    private function nextFor($elem) {
        return $this->getSuccessor();
    }

    public function getSuccessor() {
        if (!$this->successor instanceof AbstractProcessorTask)
            $this->setSuccessor(new ProcessorNullTask);

        return $this->successor;
    }

    public function setSuccessor(AbstractProcessorTask $successor) {
        return $this->successor = $successor;
    }

    abstract public function run($elem);
}
