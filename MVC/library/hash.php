<?php

namespace Library;

/**
 * Description of hash
 *
 * @author Ionut
 */
class Hash {
    
    public static function encryptsPassword($password){
        $add = array('59o AS23', 'sWX 730 Iqp', '7u bdx 2QPZ a2');
        $password = $add[1] . $password . $add[0];
        $password = md5($password) . sha1($password) . md5($password);
        $password = sha1($password) . md5($password) . sha1($password);
        $password = $add[0] . $password . $add[1];
        $password = sha1($password);
        $for = null;
        for($i = 0; $i < strlen($password); $i++){
            if($i == 19){
                $for .= $password[$i] . $add[2];
            }
            else{
                $for .= $password[$i];
            }
        }
        $password = $for;
        for($i = 1; $i <= 10; $i++){ $password = md5($password); }
        $context = hash_init('sha256', HASH_HMAC, '5Aqp9o S2WX x 20 I3s7d a237QPZu b');
        hash_update($context, $password);
        return hash_final($context);
    }
}
