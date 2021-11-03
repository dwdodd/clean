<?php

require_once PATH_TO . 'resource/ClassLoader.php';
use resource\{ClassLoader, Middleware};
use src\repositories\user\GetUserListRepository;
new ClassLoader;

final class GetUserListService
{
    private $repo;

    public function __construct($info)
    {
        try{
            if($info){
                Middleware::request_location($info->location);
                $this->repo = new GetUserListRepository;
                $response = $this->repo->getList($info);
                exit(json_encode($response));
            }
        }
        catch (\Throwable $th){ exit('Algo salio mal: ' . $th->getMessage()); }
    }

    public function __destruct(){ $this->repo; }
}