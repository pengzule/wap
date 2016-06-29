<?php

namespace App\Http\Controllers;

use App\SystemManager\Repositories\GenericAgentRepository;
use App\SystemManager\Services\ThriftService;
use Illuminate\Http\Request;
use Carbon\Carbon;
use App\Models\AppResult;
use Log;

class GenericAgentController extends Controller
{
    protected $genericAgentRepository;
    protected $thriftService;
    protected $appResult;

    /**
     * GenericAgentController constructor.
     * @param GenericAgentRepository $genericAgentRepository
     */
    public function __construct(GenericAgentRepository $genericAgentRepository,ThriftService $thriftService,AppResult $appResult)
    {
        $this->genericAgentRepository = $genericAgentRepository;
        $this->thriftService = $thriftService;
        $this->appResult = $appResult;
    }

    public function index()
    {
        $result = $this->thriftService->connect('get app lists');
        $result_arr = ($result!='' ? explode(';', $result) : array());
        $baseUrl =  $GLOBALS['G_CONFIG']['soa_client']['bbs'];
        list($http, $IpPortStr) = explode("//",strval($baseUrl),2);
        list($IpStr, $PortStr) = explode(":",strval($IpPortStr),2);
        list($GamStr, $PortStr) = explode(":",strval($result_arr[0]),2);
        $time = Carbon::now();
        $new = array();
        for($i=1;$i<count($result_arr)-1;$i++)
        {
            list($nameStr, $PortStr) = explode(":",strval($result_arr[$i]),2);
            $ips= array($nameStr);
            $IpPort = $IpStr.':'.$PortStr;
            $IpPorts = array($IpPort);
            $news = array_merge($ips,$IpPorts);
            array_push($new,$news);
        }
        $loglevel = 'Warning';
        $loglevel_arr = array('Trace','Debug','Warning','Info','Fail','Error','Normal','Message');

        return view('form')->with('ips',$new)
            ->with('time',$time)
            ->with('result',$result)
            ->with('IpPort',$IpPortStr)
            ->with('result_arr',$GamStr)
            ->with('loglevel',$loglevel)
            ->with('loglevel_arr',$loglevel_arr);
    }


    public function subchild(Request $request)
    {
        $result = $this->thriftService->connect('get app lists');
        $result_arr = ($result!='' ? explode(';', $result) : array());
        $baseUrl =  $GLOBALS['G_CONFIG']['soa_client']['bbs'];
        list($http, $IpPortStr) = explode("//",strval($baseUrl),2);
        list($IpStr, $PortStr) = explode(":",strval($IpPortStr),2);
        $time = Carbon::now();
        $new = array();
        for($i=1;$i<count($result_arr)-1;$i++)
        {
            list($nameStr, $PortStr) = explode(":",strval($result_arr[$i]),2);
            $ips= array($nameStr);
            $IpPort = $IpStr.':'.$PortStr;
            $IpPorts = array($IpPort);
            $news = array_merge($ips,$IpPorts);
            array_push($new,$news);
        }
        $loglevel = 'Debug';
        $loglevel_arr = array('Trace','Debug','Warning','Info','Fail','Error','Normal','Message');

        $this->appResult->status = 0;
        $this->appResult->message= '返回成功';
        $this->appResult->ips = $new;
        $this->appResult->time = $time;
        $this->appResult->state = $result;
        $this->appResult->loglevel = $loglevel;
        $this->appResult->loglevel_arr = $loglevel_arr;

        return   $this->appResult->toJson();
    }

    public function sendcommand(Request $request)
    {
        $command = $request->input('command','');
        $result = $this->thriftService->connect($command);

        $this->appResult->status = 0;
        $this->appResult->message= '返回成功';
        $this->appResult->return = $result;

        return   $this->appResult->toJson();
    }
 


}