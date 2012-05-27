<?php

// TODO: 1. fix user save validation problem. (Currently using save(false) to pass validation)

class ApiController extends Controller
{
    // Members
    /**
     * Key which has to be in HTTP USERNAME and PASSWORD headers
     */

    const APPLICATION_ID = 'ASCCPE';

    /**
     * Default response format
     * either 'json' or 'xml'
     */
    private $format = 'json';

    /**
     * Sandbox environment
     * 
     */
//    private $apnsCert = "ck_sandbox.pem";
//    private $apnsHost = 'gateway.sandbox.push.apple.com';

    private $apnsCert = "ck_production.pem";
    private $apnsHost = 'gateway.push.apple.com';
    
    private $apnsPort = '2195';
    private $passPhrase = 'pspfzh1307';

    private function _checkAuth()
    {
//        echo CJSON::encode($_SERVER);
        // Check if we have the USERNAME and PASSWORD HTTP headers set?
        if (!(isset($_SERVER['HTTP_USERNAME']) and isset($_SERVER['HTTP_PASSWORD'])))
        {
            // Error: Unauthorized
            return false;
        }
        $username = $_SERVER['HTTP_USERNAME'];
        $password = $_SERVER['HTTP_PASSWORD'];

        // Find the user
        $user = User::model()->find('LOWER(email)=?', array(strtolower($username)));
        if ($user === null)
        {
            // Error: Unauthorized
            return false;
        } else if (!$user->validatePassword($password))
        {
            // Error: Unauthorized
            return false;
        }

        return true;
    }

    /**
     * @return array action filters
     */
    public function filters()
    {
        return array();
    }

    // Web service for iphone application
    public function actionUserLogin()
    {
        $result = array();
        if (!$this->_checkAuth())
        {
            $result['status'] = 'Error';
            $result['message'] = '邮箱或密码错误';
        } else
        {
            // TODO: using transactions
            $user = User::model()->find('LOWER(username)=?', array(strtolower($_SERVER['HTTP_USERNAME'])));
            $user->latitude = $_POST['latitude'];
            $user->longitude = $_POST['longitude'];
            $user->last_login_time = gmdate("Y-m-d h:i:s", time());            

//            echo CJSON::encode($user);

            if ($user->save(false))
            {
                $userString = CJSON::encode($user);
                $userDict = CJSON::decode($userString);

                $userDict['province'] = $user->provinceText;
                $userDict['city'] = $user->cityText;
                $userDict['love_role'] = $user->loveRoleText;
                $userDict['come_out_status'] = $user->comeOutStatusText;
                $userDict['marriage_status'] = $user->marriageStatusText;
                $userDict['looking_for'] = $user->lookingForText;
                $userDict['profession'] = $user->professionText;
                $userDict['smoke_status'] = $user->smokeStatusText;
                $userDict['drink_status'] = $user->drinkStatusText;

                if (isset($_POST['device_infor']))
                {
//                    echo "save device infor\n";
                    $deviceInfor = CJSON::decode($_POST['device_infor']);
                    if ($deviceInfor['device_token'] != NULL)
                    {
//                        echo "save device infor 1\n";
                        $appName = $deviceInfor['app_name'];
                        $appVersion = $deviceInfor['app_version'];
                        $deviceUID = $deviceInfor['device_uid'];
                        $deviceToken = $deviceInfor['device_token'];
                        $deviceName = $deviceInfor['device_name'];
                        $deviceModel = $deviceInfor['device_model'];
                        $deviceVersion = $deviceInfor['device_version'];
                        $userID = $user->id;
//                        echo "user: " . $userID . "\n";

                        if (!$this->registerDevice($appName, $appVersion, $deviceUID, $deviceToken, $deviceName, $deviceModel, $deviceVersion, $userID))
                        {
                            $result['message'] = 'Failed register device for push notification';
                        }
                    }
                }
                $result['status'] = 'OK';
                $result['user'] = $userDict;
            } else
            {
                $result['status'] = 'Error';
                $result['message'] = '无法保存用户信息';
            }
        }

        echo CJSON::encode($result);
    }
}

?>