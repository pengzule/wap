<?php

namespace App\SystemManager\Repositories;

use App\Entity\GenericAgent;
use App\Http\Controllers\Controller;

class GenericAgentRepository extends Controller
{

    /**
     * 注入GenericAgent Model
     */
    private $genericAgent;


    /**
     * GenericAgentRepository constructor.
     * @param GenericAgent $genericAgent
     */
    public function __construct(GenericAgent $genericAgent)
    {
        $this->genericAgent = $genericAgent;
    }

    /**
     * @return mixed
     */
    public function index($parent)
    {
        return $this->genericAgent->where('parent',$parent)->get();
    }







}