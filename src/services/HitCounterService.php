<?php

namespace coderius\hitCounter\services;

use Yii;
use yii\base\Component;
use yii\di\Instance;
use coderius\hitCounter\Module;
use coderius\hitCounter\components\deviceDetect\IDeviceDetect;
use yii\web\Request;
use coderius\hitCounter\traits\RequestTrait;
use coderius\hitCounter\models\HitCounterModel;
use coderius\hitCounter\repositories\HitCounterRepository;
use yii\helpers\Inflector;
use yii\base\InvalidConfigException;
use yii\helpers\StringHelper;
use coderius\hitCounter\entities\HitCounter;
use yii\helpers\ArrayHelper;
use coderius\hitCounter\dto\HitDTO;
use yii\web\BadRequestHttpException;


class HitCounterService extends Component{

    use RequestTrait;

    private $deviceDetector;
    private $repoHitCounter;

    public function __construct(IDeviceDetect $dd, HitCounterRepository $hcr,  $config = [])
    {
        $this->deviceDetector = $dd;
        $this->repoHitCounter = $hcr;
        parent::__construct($config);
        
    }

    public function create(HitCounterModel $model, string $entityClass = HitCounter::class): HitCounter
    {
        $dto = (new HitCounterModelDtoAssembler())->writeDto($model);//dto
        $hit = (new HitCounterDtoAssembler($entityClass))->readDto($dto);

        $this->repoHitCounter->save($hit);
        return $hit;
    }
    
    public function loadModel(Request $request)
    {
        $model = new HitCounterModel();
        $model->setAttributes($this->detectJsVisitInfo($request));
        $model->setAttributes($this->detectServerVisitInfo($request));
        return $model;
    }

    private function detectJsVisitInfo(Request $request)
    {
        $array = $request->get();
        $data = [];
        
        if(isset($array['i'])){
            $data['counter_id']         = $array['i'];
            $data['js_cookei_enabled']  = ArrayHelper::getValue($array, 'c', 0);
            $data['js_java_enabled']    = ArrayHelper::getValue($array, 'j', 0);
            $data['js_timezone_offset'] = ArrayHelper::getValue($array, 't');
            $data['js_timezone']        = ArrayHelper::getValue($array, 'tz');
            $data['js_connection']      = ArrayHelper::getValue($array, 'cnt');
            $data['js_current_url']     = ArrayHelper::getValue($array, 'u');
            $data['js_referer_url']     = ArrayHelper::getValue($array, 'r');
            $data['js_screen_width']    = ArrayHelper::getValue($array, 'w');
            $data['js_screen_height']   = ArrayHelper::getValue($array, 'h');
            $data['js_color_depth']     = ArrayHelper::getValue($array, 'd');
            $data['js_browser_language']= ArrayHelper::getValue($array, 'lg');
            $data['js_history_length']  = ArrayHelper::getValue($array, 'hl');
            $data['js_is_toutch_device']= ArrayHelper::getValue($array, 'td', 0);
            $data['js_processor_ram']   = ArrayHelper::getValue($array, 'ram');

            return $data;
        }else{
           throw new BadRequestHttpException('required get param "i" cannot be empty.'); 
        }

    }   
    
    private function detectServerVisitInfo(Request $request)
    {
        // $request = Yii::$app->request;
        $data = [];

        //Common user data
        $data['serv_ip']             = $request->getUserIP();
        $data['serv_user_agent']     = $request->getUserAgent();
        $data['serv_referer_url']    = $request->getReferrer();
        $data['serv_server_name']    = $request->getServerName();
        $data['serv_auth_user_id']   = \Yii::$app->user->isGuest ? null : Yii::$app->user->identity->id;
        
        $data['serv_port']           = $request->getPort();
        $data['serv_cookies']        = \yii\helpers\Json::encode($request->getCookies());

        //Device detect
        $data['serv_os']     = \yii\helpers\Json::encode($this->deviceDetector->getOs());
        $data['serv_client'] = \yii\helpers\Json::encode($this->deviceDetector->getClient());
        $data['serv_device'] = $this->deviceDetector->getDeviceName();
        $data['serv_brand']  = $this->deviceDetector->getBrandName();
        $data['serv_model']  = $this->deviceDetector->getModel();
        $data['serv_bot']    = $this->deviceDetector->getBot();

        //Organizacion provider detect
        $data['serv_host_by_ip'] = $this->getHostByAddr();
        $data['serv_is_proxy_or_vpn'] = (int)$this->isProxyVisit();

        //Set mark cookie
        $data['cookie_mark'] = static::pastCookieMark();

        return $data;
        
    }

    private static function pastCookieMark()
    {
        $request = Yii::$app->request;
        $response = Yii::$app->response;

        $name = static::defaultNameCookieMark();

        if ($request->cookies->has($name)){
            return $request->cookies->getValue($name);
        }else{
            $str = Yii::$app->getSecurity()->generateRandomString();
            
            // add to HTTP
            $response->cookies->add(new \yii\web\Cookie([
                'name'  => $name,
                'value' => $str,
            ]));

            return $str;    
        }
        // throw new InvalidConfigException('Invalid actual name "' . gettype($actualName) . '" specified at "' . get_class($this) . '::normalizeUserAttributeMap"');
    }

    public static function defaultNameCookieMark()
    {
        return Inflector::camel2id(StringHelper::basename(__CLASS__));
    }

}