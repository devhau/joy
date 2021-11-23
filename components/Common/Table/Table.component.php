<?php

class TableComponent extends Component
{
    public function __construct($id = null)
    {
        parent::__construct($id);
    }
    public function Mount($configs)
    {
        $this->tableConfigs = $configs;
    }
    public function Render(): string
    {
        return $this->View();
    }
}
