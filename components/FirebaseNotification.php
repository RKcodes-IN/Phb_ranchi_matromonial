<?php

namespace app\components;

use Yii;
use yii\base\Component;
use app\modules\admin\models\WebSetting;
use app\modules\admin\models\AuthSession;
use CURLFile;

class FirebaseNotification extends Component
{

    public function FirebaseApi($id = '', $user_id, $title, $body, $api_key, $device_token)
    {

        $msg = array(
            'body' => $title,
            'title' => $body,
            'vibrate' => 1,
            'sound' => 1,
            'order_id' => $id,
        );

        $msg1 = array(
            'body' => $title,
            'title' => $body,
            'vibrate' => 1,
            'sound' => 1,
            'order_id' => $id,
        );
        // var_dump($msg1);exit;
        $fields = array(
            'to' => $device_token,
            'collapse_key' => 'type_a',
            // 'notification' => $msg1,
            'data' => $msg,

        );
        $headers = array(
            'Authorization: key=' . $api_key,
            'Content-Type: application/json',
        );
        $ch = curl_init();
        curl_setopt($ch, CURLOPT_URL, 'https://fcm.googleapis.com/fcm/send');
        curl_setopt($ch, CURLOPT_POST, true);
        curl_setopt($ch, CURLOPT_HTTPHEADER, $headers);
        curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
        curl_setopt($ch, CURLOPT_SSL_VERIFYPEER, false);
        curl_setopt($ch, CURLOPT_POSTFIELDS, json_encode($fields));
        $result = curl_exec($ch);

        curl_close($ch);
    }

    //Send Notification to User
    public function UserNotification($id = '', $user_id, $title, $body)
    {

        // var_dump($id);exit;
        $setting = new WebSetting();
        $customer_notification_key = $setting->getSettingBykey('user_notification_key');
        $auth_sess = new AuthSession();
        $device_token = $auth_sess->getDeviceToken($user_id);
        $title = $title;
        $body = $body;

        Yii::$app->notification->FirebaseApi($id, $user_id, $title, $body, $customer_notification_key, $device_token);
    }

    //Send SMS
    public function sendSMS($contact_no, $msg)
    {

        $setting = new WebSetting();
        $sms_api_key = $setting->getSettingBykey('sms_api_key');
        $curl = curl_init();

        curl_setopt_array($curl, array(
            CURLOPT_URL => "http://2factor.in/API/V1/$sms_api_key/ADDON_SERVICES/SEND/TSMS",
            CURLOPT_RETURNTRANSFER => true,
            CURLOPT_ENCODING => "",
            CURLOPT_MAXREDIRS => 10,
            CURLOPT_TIMEOUT => 0,
            CURLOPT_FOLLOWLOCATION => true,
            CURLOPT_HTTP_VERSION => CURL_HTTP_VERSION_1_1,
            CURLOPT_CUSTOMREQUEST => "POST",
            CURLOPT_POSTFIELDS => array('From' => 'TFCTOR', 'To' => '91' . $contact_no, 'Msg' => $msg),
            CURLOPT_HTTPHEADER => array(
                "Cookie: __cfduid=d3873a75f3e6843a5117359bd027d9c7a1588843417",
            ),
        ));

        $response = curl_exec($curl);

        curl_close($curl);
    }

    //Send OTP
    public function sendOtp($contact_no)
    {
        $setting = new WebSetting();
        $sms_api_key = $setting->getSettingBykey('sms_api_key');
        $curl = curl_init();

        curl_setopt_array($curl, array(
            CURLOPT_URL => "http://2factor.in/API/V1/$sms_api_key/SMS/91$contact_no/AUTOGEN",
            CURLOPT_RETURNTRANSFER => true,
            CURLOPT_ENCODING => "",
            CURLOPT_MAXREDIRS => 10,
            CURLOPT_TIMEOUT => 0,
            CURLOPT_FOLLOWLOCATION => true,
            CURLOPT_HTTP_VERSION => CURL_HTTP_VERSION_1_1,
            CURLOPT_CUSTOMREQUEST => "GET",
            CURLOPT_HTTPHEADER => array(
                "Cookie: __cfduid=d3873a75f3e6843a5117359bd027d9c7a1588843417",
            ),
        ));

        $response = curl_exec($curl);

        curl_close($curl);
        return $response;
    }

    //Verify OTP
    public function verifyOtp($session_code, $otp_code)
    {
        $setting = new WebSetting();
        $sms_api_key = $setting->getSettingBykey('sms_api_key');
        $curl = curl_init();
        //  var_dump($sms_api_key); exit;

        curl_setopt_array($curl, array(
            CURLOPT_URL => "http://2factor.in/API/V1/$sms_api_key/SMS/VERIFY/$session_code/$otp_code",
            CURLOPT_RETURNTRANSFER => true,
            CURLOPT_ENCODING => "",
            CURLOPT_MAXREDIRS => 10,
            CURLOPT_TIMEOUT => 0,
            CURLOPT_FOLLOWLOCATION => true,
            CURLOPT_HTTP_VERSION => CURL_HTTP_VERSION_1_1,
            CURLOPT_CUSTOMREQUEST => "GET",
            CURLOPT_HTTPHEADER => array(
                "Cookie: __cfduid=d3873a75f3e6843a5117359bd027d9c7a1588843417",
            ),
        ));

        $response = curl_exec($curl);

        curl_close($curl);

        return $response;
    }
    // Image Kit

    public function imageKitUpload($image)
    {
        // var_dump($image->tempName);exit;
        $curl = curl_init();

        curl_setopt_array($curl, array(
            CURLOPT_URL => 'https://upload.imagekit.io/api/v1/files/upload',
            CURLOPT_RETURNTRANSFER => true,
            CURLOPT_ENCODING => '',
            CURLOPT_MAXREDIRS => 10,
            CURLOPT_TIMEOUT => 0,
            CURLOPT_FOLLOWLOCATION => true,
            CURLOPT_HTTP_VERSION => CURL_HTTP_VERSION_1_1,
            CURLOPT_CUSTOMREQUEST => 'POST',
            CURLOPT_POSTFIELDS => array(
                'file' => new CURLFile($image->tempName),
                'fileName' => rand(000000, 999999999999) . 'news.jpg'
            ),
            CURLOPT_HTTPHEADER => array(
                'Authorization: Basic cHJpdmF0ZV9XaGlpeDNTWXVZYUJVVVVwbk9UQmVzNERjL2c9OlJvaGl0QDE4MTE='
            ),
        ));

        $response = curl_exec($curl);

        // var_dump($response);
        // exit;
        curl_close($curl);

        return json_decode($response, true);
    }
}
