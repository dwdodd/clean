<?php

require_once PATH_TO . 'resource/ClassLoader.php';
use resource\{ClassLoader, Middleware};
use src\repositories\user\GetUserListRepository;
new ClassLoader;

final class GetUserListService
{
    public function __construct($info)
    {
        try{
            if($info){
                Middleware::token_access($info->token);
                $repository = new GetUserListRepository;
                $response = $repository->getList($info);
                exit(json_encode($response));
            }
        }
        catch (\Throwable $th){ exit('Algo salio mal: ' . $th->getMessage()); }
    }
}