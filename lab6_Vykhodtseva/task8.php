<?php

class TwitterService {
    protected $_data; // Declare the property

    public function setMessage($text) {
        $this->_data['message'] = $text;
        echo $this->_data['message'] . PHP_EOL;
    }

    public function sendTweet() {
        echo "I sent a tweet" . PHP_EOL;
    }
}

// SmsService class to handle SMS functionalities
class SmsService {
    protected $_data; // Declare the property

    public function setMessage($text) {
        $this->_data['message'] = $text;
        echo "<br>SMS Content: " . $this->_data['message'] . PHP_EOL;
    }

    public function sendText($time = null) {
        if ($time) {
            echo "Scheduled to send SMS at: " . $time . PHP_EOL;
        } else {
            echo "I sent an SMS immediately" . PHP_EOL;
        }
    }
}

interface NotificationInterface {
    public function setData($data);
    public function sendNotification();
}

class TwitterAdapter implements NotificationInterface {
    protected $_data;

    public function setData($data) {
        $this->_data = $data;
    }

    public function sendNotification() {
        $twitterClient = new TwitterService();
        $twitterClient->setMessage($this->_data['message']);
        $twitterClient->sendTweet();
    }
}

class SmsAdapter implements NotificationInterface {
    protected $_data;

    public function setData($data) {
        $this->_data = $data;
    }

    public function sendNotification() {
        $smsClient = new SmsService();
        $smsClient->setMessage($this->_data['message']);
        // Send the message with a specific time if provided
        $smsClient->sendText($this->_data['time'] ?? null);
    }
}

interface INotificationManager {
    public function sendNotification($type = '', $data);
}

class NotificationManager implements INotificationManager {
    public function sendNotification($type = '', $data) {
        switch ($type) {
            case "twitter":
                $notification = new TwitterAdapter();
                break;
            case "sms":
                $notification = new SmsAdapter();
                break;
            default:
                echo "Error: Unsupported notification type" . PHP_EOL;
                return false;
        }

        $notification->setData($data);
        $notification->sendNotification();
    }
}

// Example usage for Twitter
$arrayTwitter = array(
    "message" => "This is a tweet<br>"
);

$a = new NotificationManager();
$a->sendNotification("twitter", $arrayTwitter);

// Example usage for SMS
$arraySms = array(
    "message" => "This is an SMS message<br>",
    "time" => "2024-10-27 10:00:00" // Scheduled time for sending the SMS
);

$a->sendNotification("sms", $arraySms);
?>
