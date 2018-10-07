<?php namespace SmallTasks;

/**
 * AbstractProcessorTask
 * 
 */
class ProcessorNullTask extends AbstractProcessorTask 
{

    private $previous;

    public function __contruct(AbstractProcessorTask $processorTask) {
        $this->previous = $processorTask;
    }

    /*
     * @inheritDoc
     */
    public function handle($elem) {
        return $elem;
    }

    public function add(AbstractProcessorTask $processorTask) {
        $this->previous->setSuccessor($processorTask);

        return $this;
    }
}
