<?php

/* Hooks */
$GLOBALS['TL_HOOKS']['processFormData'][]        = array('Bcs\Hooks\FormHooks', 'onFormSubmit');
