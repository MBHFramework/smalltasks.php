<?php namespace SmallTasks;

/**
 * ProcessorTask
 * 
 * @package smalltasks
 * @author Ulises Jeremias Cornejo Fandos <ulisescf.24@gmail.com>
 * @author Federico Ramon Gasquez <federicogasquez@gmail.com>
 */
abstract class ProcessorTask extends AbstractProcessorTask
{
    private $successor;

    public function __construct() {
        $this->getSuccessor(new ProcessorNullTask);
    }
    
    /*
     * @inheritDoc
     */
    public function handle($elem) {
        $result = $this->run($elem);

        return $this->nextFor($elem).handle($result);
    }

    private function nextFor($elem) {
        return $this->getSuccessor();
    }

    public function getSuccessor() {
        return $this->successor;
    }

    public function setSuccessor(AbstractProcessorTask $successor) {
        return $this->successor = $successor;
    }

    abstract public function run($elem);
}