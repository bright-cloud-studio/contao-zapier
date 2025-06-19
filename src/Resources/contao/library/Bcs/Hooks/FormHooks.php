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
            echo "Hook Hooked hookfully!";
            die();
        }
        
            
        }
        
    }

}
