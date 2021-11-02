<?php

require_once PATH_TO . 'resource/ClassLoader.php';
use resource\ClassLoader;
use src\services\GetListRepository;
new ClassLoader;

final class GetListService
{
    private $repo;

    public function __construct($info)
    {
        try{
            if($info){
                $this->repo = new GetListRepository;
                $response = $this->repo->list($info);
                exit(json_encode($response));
            }
        }
        catch (\Throwable $th){ exit('Algo salio mal: ' . $th->getMessage()); }
    }

    public function __destruct(){ $this->repo; }
}