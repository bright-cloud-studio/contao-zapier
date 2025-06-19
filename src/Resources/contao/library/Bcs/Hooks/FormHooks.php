<?php

namespace Bcs\Hooks;

use Contao\Controller;
use Contao\Environment;
use Contao\FrontendUser;
use Contao\Input;
use Contao\MemberModel;
use Contao\PageModel;


class FormHooks
{

    // When a form is submitted
    public function onFormSubmit($submittedData, $formData, $files, $labels, $form)
    {
        
        // Assignment Selection Form
        if($formData['formID'] == 'zapier') {
            
            // now rename and assign vars
            $_ZAP_ARRAY = array(
                "test_var_1" => "test data",
                "test_var_2" => "test data bbb",
                "test_var_3" => "test data ccc",
                "test_var_4" => "test ddd"
            );
            
            // stuff it into a query
            $_ZAP_ARRAY = http_build_query($_ZAP_ARRAY );
            
            // get my zap URL
            $ZAPIER_HOOK_URL = "https://hooks.zapier.com/hooks/catch/23448046/uokmvyp/";
            
            // curl my data into the zap
            $ch = curl_init( $ZAPIER_HOOK_URL);
            curl_setopt( $ch, CURLOPT_POST, 1);
            curl_setopt( $ch, CURLOPT_POSTFIELDS, $_ZAP_ARRAY);
            curl_setopt( $ch, CURLOPT_FOLLOWLOCATION, 1);
            curl_setopt( $ch, CURLOPT_HEADER, 0);
            curl_setopt( $ch, CURLOPT_RETURNTRANSFER, 1);
            
            $response = curl_exec( $ch );
            
            echo "Hook Hooked hookfully!";
            die();
        }

    }

}
