<?php

require_once PATH_TO . 'autoload.php';
use resource\Middleware;
use src\user\repositories\GetUserListRepository;

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