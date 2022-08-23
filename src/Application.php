<?php

namespace HnScript;

use HnScript\Http\Route;
use HnScript\Database\DB;
use HnScript\Http\Request;
use HnScript\Http\Response;
use HnScript\Support\Config;
use HnScript\Support\Session;
use HnScript\Database\Managers\MySQLManager;
use HnScript\Database\Managers\SQLiteManager;

class Application
{
    protected Route $route;
    protected Request $request;
    protected Response $response;
    protected DB $db;
    protected Config $config;
    protected Session $session;

    public function __construct()
    {
        $this->request = new Request;
        $this->response = new Response;
        $this->route = new Route($this->request, $this->response);
        $this->db = new DB($this->getDatabaseDriver());
        $this->config = new Config($this->loadConfigurations());
        $this->session = new Session;
    }

    protected function getDatabaseDriver()
    {
         return match(env('DB_DRIVER')) {
            'sqlite' => new SQLiteManager,
            'mysql' => new MySQLManager,
            default => new SQLiteManager
        };
    }

    protected function loadConfigurations()
    {
        foreach(scandir(config_path()) as $file) {
            if ($file == '.' || $file == '..') {
                continue;
            }
            $filename = explode('.', $file)[0];

            yield $filename => require config_path() . $file;
        }

    }

    public function run()
    {
        $this->db->init();

        $this->route->resolve();
    }

    public function __get($name)
    {
        if(property_exists($this, $name)) {
            return $this->$name;
        }
    }
}
