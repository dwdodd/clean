<?php

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
                $output   = OutPut::format($info->format, $response);
                return $output;
            }
        }
        catch (\Throwable $th){ exit('Algo salio mal: ' . $th->getMessage()); }
    }

    public function __destruct(){ $this->repo; }
}