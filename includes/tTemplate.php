<?php

class tTemplate  {
    private $content;
    public function __construct($name)  {
        $this->content = file_get_contents('./resources/views/' . $name . '.html');

        $this->content = preg_replace('/{ROOT}/i', ROOT, $this->content);
    }

    function replaceVars($vars = [])  {
        if(!empty($vars)) {
            foreach($vars as $blockname => $value) {
                $this->content = preg_replace('/{' . $blockname . '}/i', $value, $this->content);
            }
        }
    }

    public function render()
    {
        return $this->content;
    }
}