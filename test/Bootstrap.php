<?php
namespace Jyggen\Curl {

    require_once './vendor/autoload.php';

    $mockAddMulti = false;
    function curl_multi_add_handle($multi, $curl)
    {
        global $mockAddMulti;
        if ($mockAddMulti) {
            return CURLM_INTERNAL_ERROR;
        }
        return \curl_multi_add_handle($multi, $curl);
    }

    $mockMultiExec = false;
    function curl_multi_exec($handle, &$active)
    {
        global $mockMultiExec;
        if ($mockMultiExec) {
            $active = false;
            return CURLM_INTERNAL_ERROR;
        }
        return \curl_multi_exec($handle, $active);
    }

}
