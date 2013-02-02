<?php
/**
 * Created by JetBrains PhpStorm.
 * User: Austin
 * Date: 2/2/13
 * Time: 6:45 AM
 */

class FBApi extends CI_Model {

    function getLikedPageTitles($user) {
        $fql = "SELECT name FROM page WHERE page_id IN(SELECT uid, page_id FROM page_fan WHERE uid = $user)";
        $result = $this->facebook->api(array(
            'method' => 'fql.query',
            'query' => $fql,
        ));
        return json_encode($result);
    }

    function getInterests($user) {

    }

    function getFbInstance() {
        return $this->facebook;
    }

    function getName($user) {
        $user = $this->facebook->api('/'.$user);
        return $user['name'];
    }

}