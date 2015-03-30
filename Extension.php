<?php

namespace Bolt\Extension\Bolt\PaypalSimple;

use Bolt;

class Extension extends \Bolt\BaseExtension
{
    /**
     * Extensions PHP name
     *
     * @var string
     */
    const NAME = "PaypalSimple";

    public function getName()
    {
        return Extension::NAME;
    }

    public function initialize()
    {
        if ($this->app['config']->getWhichEnd() == 'frontend') {
            // Add Twig functions
            $this->addTwigFunction('paypalbutton', 'paypalButton');
        }
    }

    /**
     * Return paypal button
     *
     * @return \Twig_Markup
     */
    public function paypalButton($recordtitle, $recordprice, $recordtax=NULL, $recordshipping=NULL)
    {
    	$str = "<script async=\"async\" src=\"https://www.paypalobjects.com/js/external/paypal-button-minicart.min.js?merchant=" . $this->config['email'] . "\"";
        $str .= "data-button=\"cart\" data-name=\"" . htmlspecialchars($recordtitle) . "\" data-amount=\"" . $recordprice . "\"";
	if($this->config['shipping'] == 'true'){
	    $str .= "data-shipping=\"" . $recordshipping . "\"";
	}
	if($this->config['tax'] == 'true') {
	    $str .= "data-tax=\"" . $recordtax ."\"";
	}
        if($this->config['currency']){
	    $str .= "data-currency=\"" . $this->config['currency'] . "\"";
	}
	if($this->config['callback']){
	    $str .="data-callback=\"" . $this->config['callbackpage'] . "\"";
	}
	if($this->config['sandbox'] == 'true'){
	    $str .="data-env=\"sandbox\"";
	}
	$str .= "></script>";
        return new \Twig_Markup($str, 'UTF-8');
    }
}
