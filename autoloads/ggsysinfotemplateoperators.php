<?php

class ggSysinfoTemplateOperators
{

    /**
     Return an array with the template operator name.
    */
    public function operatorList()
    {
        return array( 'installedphpcache');
    }

    /**
     @return true to tell the template engine that the parameter list exists per operator type,
             this is needed for operator classes that have multiple operators.
    */
    public function namedParameterPerOperator()
    {
        return true;
    }

    /**
     @See eZTemplateOperator::namedParameterList
    */
    public function namedParameterList()
    {

        return array(
                      'installedphpcache' => array()
                    );
    }

    /**
     Exécute la fonction PHP correspondant à l'opérateur
    */
    public function modify( &$tpl, &$operatorName, &$operatorParameters, &$rootNamespace, &$currentNamespace, &$operatorValue, &$namedParameters )
    {

        switch ( $operatorName )
        {
            case 'installedphpcache':
            {
                if ( isset( $GLOBALS['_PHPA'] ) )
                {
                    $operatorValue = 'phpaccelerator';
                }
                else if ( extension_loaded( "Turck MMCache" ) )
                {
                    $operatorValue = 'mmcache';
                }
                else if ( extension_loaded( "eAccelerator" ) )
                {
                    $operatorValue = 'eaccelerator';
                }
                else if ( extension_loaded( "apc" ) )
                {
                    $operatorValue = 'apc';
                }
                else if ( extension_loaded( "Zend Performance Suite" ) )
                {
                    $operatorValue = 'performancesuite';
                }
                else if ( extension_loaded( "xcache" ) )
                {
                    $operatorValue = 'xcache';
                }
                else
                {
                        $operatorValue = '';
                }
                break;
            }
        }
    }

}

?>