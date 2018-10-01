<?php namespace SmallTasks;

/**
 * AbstractProcessorTask
 * 
 * @package smalltasks
 * @author Ulises Jeremias Cornejo Fandos <ulisescf.24@gmail.com>
 * @author Federico Ramon Gasquez <federicogasquez@gmail.com>
 */
class ProcessorNullTask extends AbstractProcessorTask 
{

    private $previous;

    public function __contruct(AbstractProcessorTask $processorTask){
        $this->previous = $processorTask;
    }

    /*
     * @inheritDoc
     */
    public function handle($elem) {
        return $elem;
    }

    public function add(AbstractProcessorTask $processorTask){
        $this->previous->setSucessor($processorTask);
        return $this;
    }
}
