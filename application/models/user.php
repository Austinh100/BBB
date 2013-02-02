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
	
	function getName() {
        $user = $this->facebook->api('/me');
		return $user['name'];
	}

    function logURL() {
        $params = array(
            'scope' => 'friends_likes, friends_interests, read_stream'
        );
        if($this->loggedIn())
            return $this->facebook->getLogoutUrl($params);
        else {
            return $this->facebook->getLoginUrl($params);
        }

    }

    function getFbProfilePic($fbID) {
        return 'https://graph.facebook.com/'.$this->facebook->api("$fbID").'/picture">';
    }

}