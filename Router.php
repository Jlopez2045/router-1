<?php

class Router
{
    private $_uri = [];
    private $_url;
    private $_method = [];

    /*
    * @desc adds a route name to uri ArrayAccess
    * @param str $name name of the router
    * @param function $method callback function
    */
    public function route($name, $method = null)
    {
        if ($name == '/')
            $name = '__root';
        else
            $name = $this->_filter($name);

        $this->_uri[] = $name;
        $this->_method[$name] = $method;
    }

    /*
    * @desc listens for requsets and responds with requsted method
    */
    public function listen()
    {
        $this->run();
    }


    /*
    * @desc checks user URL, calls requsted method
    */
    public function run()
    {
        // filter url name
        if (isset($_REQUEST['url']))
            $name = $this->_filter($_REQUEST['url']);
        else
            $name =  '__root';
        $this->_url = $name;

        // call method
        if (isset($this->_url))
        {
            if (in_array($this->_url, $this->_uri))
                call_user_func($this->_method[$name]);
            else
                $this->_notFound();
        }
    }

    /*
    * @desc replaces slashes with underscores for method and uri names
    * @param string $str string to be filtered/sanitized
    */
    private function _filter($str)
    {
        $str = trim($str, '/');
        $str = rtrim($str, '/');
        return str_replace('/','_',
                    filter_var(
                        $str,
                        FILTER_SANITIZE_STRING
                    ));
    }

    private function _notFound()
    {
        echo "<h1>404 Page Not Found</h1>";
    }
}
