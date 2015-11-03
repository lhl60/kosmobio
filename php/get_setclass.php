<?php
    class get_setclass
    {
        public $data;

        public function __set($name, $value)
        {
            $this->data[$name] = $value;
        }

        public function &__get($param)
        {
            if (array_key_exists($param, $this->data))
            {
                return $this->data[$param];
            } else
            {
                throw  new Exception("(". $param . ")  does not exist;");
            }
        }

        public function __construct()
        {
            $this->data = array();
        }
    }
?>
