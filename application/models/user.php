<?php
/**
 * Created by JetBrains PhpStorm.
 * User: Austin
 * Date: 2/2/13
 * Time: 6:45 AM
 */

class User extends CI_Model {

    function getFriendsList() {
        return json_encode($this->facebook->api("/me/friends"));
    }

    function loggedIn() {
        $user = $this->facebook->getUser();
        if ($user) {
            try {
                // Proceed knowing you have a logged in user who's authenticated.
                $user_profile = $this->facebook->api('/me');
                return true;
            } catch (FacebookApiException $e) {
                error_log($e);
                $user = null;
            }
        }
        return false;
    }

    function logURL() {
        if($this->loggedIn())
            return $this->facebook->getLogoutUrl();
        else {
            $params = array('req_perms' => 'friend_likes,friend_interests,read_stream');
            return $this->facebook->getLoginUrl($params);
        }

    }

    function getFbProfilePic($fbID) {
        return '<img src="https://graph.facebook.com/'
            .$this->facebook->api("$fbID").'/picture">';
    }

}