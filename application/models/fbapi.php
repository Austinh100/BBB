<?php
/**
 * Created by JetBrains PhpStorm.
 * User: Austin
 * Date: 2/2/13
 * Time: 6:45 AM
 */

class FBApi extends CI_Model {

    function getLikedPageTitles() {
        $fql = array(
            "query1"=>"SELECT uid, page_id FROM page_fan WHERE uid IN (SELECT uid2 FROM friend WHERE uid1 = me())",
            "query2"=>"SELECT name FROM page WHERE `page_id`= page_id IN (#query1)");
        $result = $facebook->api(array(
            'method' => 'fql.query',
            'query' => $fql,
        ));
    }

    function getFbInstance() {
        return $this->facebook;
    }

}