<?php

class HelloComponent extends Component
{
    public function __construct($id=null)
    {
        parent::__construct($id);
    }
    public function Render(): string
    {
        return $this->View();
    }
}
