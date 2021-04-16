<?php

class DB {

    public $db_con;
    public $query = array();

    public function __construct()
    {
        $this->connect();
    }
    
    public function _debug()
    {
        if (isset($_GET['debug'])) {
            return true; 
        } 
        return false;
    }

    public function __destruct()
    {
        if ($this->_debug()) {
            echo '<div class="container mx-auto">
            <ul class="w-full">';
            foreach ($this->query as $query) {
                echo '<li class="flex">'
                    . '<span>' . $query['sql'] . '</span>'
                    . '<span class="ml-auto">' . $query['duration'] . '</span>'
                    . '</li>';
            } 
            echo '</ul></div>';
        }
    }

    public function connect() {

        global $root_path;
        global $db_host;
        global $db_username;
        global $db_password;
        global $db_database;
       
        $this->db_con = mysqli_connect(
            $db_host, 
            $db_username,
            $db_password, 
            $db_database
        );
    }

    public function query($sql)
    {
        if (! $this->db_con) {
            $this->connect();
        }

        $time_start = microtime(TRUE);

        $query = mysqli_query($this->db_con, $sql);

        $time_end = microtime(true);

        $query_duration = $time_end - $time_start;
        
        $this->query[] = array(
            'sql' => $sql,
            'duration' => $query_duration
        );
        
        return $query;
    }

    public function fetch_assoc($query)
    { 
        return mysqli_fetch_assoc($query);
    }

    public function num_rows()
    {
        return mysqli_affected_rows($this->db_con);
    }
}