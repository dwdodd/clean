<?php

require_once PATH_TO . 'resource/ClassLoader.php';

use resource\ClassLoader;
use src\test\GetListInterface;

ClassLoader::run();

final class GetListService
{
    private $repo;

    public function __construct(GetListInterface $repo)
    {
        $this->repo = $repo;
    }

    public function __invoke($info)
    {
        try{
            if($info){
                $response = $this->repo->list($info);
                exit(json_encode($response));
            }
        }
        catch (\Throwable $th){ exit('Algo salio mal: ' . $th->getMessage()); }
    }

    public function __destruct(){ $this->repo; }
}