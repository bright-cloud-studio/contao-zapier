<?php

namespace Bcs\Hooks;

use Contao\Config;
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
            
            // Grab the hook url from Settings
            $config_url = Config::get('zapier_hook_url');
            
            if($config_url) {
                
                // Convert $submitted data into this format
                $demo_array = array(
                    "test_var_1" => "test data",
                    "test_var_2" => "test data bbb",
                    "test_var_3" => "test data ccc",
                    "test_var_4" => "test ddd"
                );
                $_ZAP_ARRAY = http_build_query($demo_array);
                
                // curl my data into the zap
                $ch = curl_init( $config_url);
                curl_setopt( $ch, CURLOPT_POST, 1);
                curl_setopt( $ch, CURLOPT_POSTFIELDS, $_ZAP_ARRAY);
                curl_setopt( $ch, CURLOPT_FOLLOWLOCATION, 1);
                curl_setopt( $ch, CURLOPT_HEADER, 0);
                curl_setopt( $ch, CURLOPT_RETURNTRANSFER, 1);
                
                $response = curl_exec( $ch );
                
                // we have successfully communicated with Zapier
                echo "Hook Hooked hookfully!";
                die();
            } else {
                // we have successfully communicated with Zapier
                echo "NO Zapier Hook URL found!";
                die();
            }
            
        }

    }

}
