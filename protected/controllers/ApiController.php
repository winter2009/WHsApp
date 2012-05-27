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
        }
        else if (!$user->validatePassword($password))
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
        }
        else
        {
            // TODO: using transactions
            $user = User::model()->find('LOWER(username)=?', array(strtolower($_SERVER['HTTP_USERNAME'])));
            
            $result['status'] = 'OK';
            $result['user'] = $user;            
        }

        echo CJSON::encode($result);
        Yii::app()->end();
    }
    
    public function actionRegisterUser()
    {
        $result = array();
        if ( isset($_POST['nick_name']) and isset($_POST['email']) and isset($_POST['password']) )
        {
            $user = new User;
            $user->nick_name = $_POST['nick_name'];
            $user->password = $_POST['password'];
            $user->password_repeat = $_POST['password'];
            $user->salt = User::generateSalt();
            $user->email = $_POST['email'];
            
            if ( $user->save() )
            {
                $result['status'] = 'OK';
                $result['user'] = $user->attributes;
            }
            else
            {
                $result['status'] = 'Error';
                $result['message'] = '创建用户失败，请重新尝试';
            }
        }
        else
        {
            $result['status'] = 'Error';
            $result['message'] = '请确保所有项目均已填写';
        }
        
        echo CJSON::encode($result);
        Yii::app()->end();
    }
    
    public function actionGetCategories()
    {
        $result = array();
        
        if (!$this->_checkAuth())
        {
            $result['status'] = 'Error';
            $result['message'] = '邮箱或密码错误';
        }
        else
        {
            $categories = Category::model()->findAll();
            $result['status'] = 'OK';
            $result['message'] = '';
            $result['categories'] = $categories;
        }
        
        echo CJSON::encode($result);
        Yii::app()->end();
    }
    
    public function actionGetSubCategories()
    {
        $result = array();
        
        if (!$this->_checkAuth())
        {
            $result['status'] = 'Error';
            $result['message'] = '邮箱或密码错误';
        }
        else
        {
            if ( isset($_POST['category_id']) )
            {
                $categoryID = $_POST['category_id'];
                $categories = Category::model()->findAll(array(
                    'condition' => 'parent_id=:parentID',                    
                    'params' => array(':parentID' => $categoryID) 
                ));
                $result['status'] = 'OK';
                $result['message'] = '';
                $result['sub_categories'] = $categories;
            }
            else
            {
                $result['status'] = 'Error';
                $result['message'] = 'Incomplete parameter';
            }
        }
        
        echo CJSON::encode($result);
        Yii::app()->end();
    }
    
    public function actionSendMessageToAdmin()
    {
        $result = array();
        
        if (!$this->_checkAuth())
        {
            $result['status'] = 'Error';
            $result['message'] = '邮箱或密码错误';
        }
        else
        {
            if ( isset($_POST['sender_id']) and isset($_POST['subject']) and isset($_POST['content']) )
            {
                $adminUser = User::model()->find('nick_name=:nickName', array(':nickName'=>'admin'));
                $adminID = $adminUser->id;
                
                $message = new Message;
                $message->sender_id = $_POST['sender_id'];
                $message->receiver_id = $adminID;
                $message->subject = $_POST['subject'];
                $message->content = $_POST['content'];
                $message->date = gmdate("Y-m-d h:i:s", time());
                
                if ( isset($_POST['parent_message_id']) )
                {
                    $message->parent_message_id = $_POST['parent_message_id'];
                }
                
                if ( $message->save() )
                {
                    $result['status'] = 'OK';
                    $result['message'] = '';
                    $result['sent_message'] = '';
                }
                else
                {
                    $result['status'] = 'Error';
                    $result['message'] = '发送信息失败，请重新尝试';
                }                
            }
            else
            {
                $result['status'] = 'Error';
                $result['message'] = 'Incomplete parameter';
            }
        }
        
        echo CJSON::encode($result);
        Yii::app()->end();
    }
    
    function actionGetMessages()
    {
        $result = array();
        
        if (!$this->_checkAuth())
        {
            $result['status'] = 'Error';
            $result['message'] = '邮箱或密码错误';
        }
        else
        {
            if ( isset($_POST['user_id']) )
            {
                $userID = $_POST['user_id'];                
                $messages = Message::model()->findAll(array(
                    'condition' => 'sender_id=:userID or receiver_id=:userID',                    
                    'params' => array(':userID' => $userID) 
                ));
                $result['status'] = 'OK';
                $result['message'] = '';
                $result['messages'] = $messages;
            }
            else
            {
                $result['status'] = 'Error';
                $result['message'] = 'Incomplete parameter';
            }
        }
        
        echo CJSON::encode($result);
        Yii::app()->end();
    }

}

?>