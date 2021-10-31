<?php

require_once PATH_TO . 'resource/ClassLoader.php';
ClassLoader::run(['resource/','connection/','connection/manager/','src/interface/','src/test/']);

final class GetListNameService
{
    private $repo;

    public function __construct(GetListNameInterface $repo)
    {
        $this->repo = $repo;
    }

    public function __invoke($info)
    {
        try{
            if($info){
                $response = $this->repo->listName($info);
                $error    = OutPut::format($info->format, $response);
                return $error;
            }
        }
        catch (\Throwable $th){ exit('Algo salio mal: ' . $th->getMessage()); }
    }

    public function __destruct(){ $this->repo; }
}