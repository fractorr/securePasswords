<?php
/**
 * Secure Password plugin for Craft CMS 3.x.
 *
 * Enforce stronger passwords on your users.
 *
 * @link      https://percipio.london
 *
 * @copyright Copyright (c) 2020 FractOrr
 */

namespace fractorr\securepasswords\services;

use Craft;
use craft\base\Component;
use Dragonbe\Hibp\HibpFactory;
use fractorr\securepasswords\models\Settings;
use fractorr\securepasswords\SecurePasswords;

/**
 * @author    FractOrr
 *
 * @since     0.1.0
 */
class SecurePasswordsService extends Component
{
    // Public Methods
    // =========================================================================

    /**
     * @var Settings
     */
    private $settings;

    public function init()
    {
        $this->settings = SecurePasswords::$plugin->settings;
    }

    public function getValidationErrors(string $password) : array
    {
		$rules = $this->settingRulesToArray($this->settings->passwordRules);
		
		$errors = array();
		
		foreach($rules as $rule)
		{
			if (isset($rule["active"]) && $rule["active"] && $rule["regex"] != "") 
			{
				preg_match("/" . $rule["regex"] . "/", $password, $output_array);
				
				if (sizeof($output_array) == 0 && $rule["match"] == "no_match") 
				{
					array_push($errors, Craft::t('secure-passwords', 'Password') . ": " . $rule["message"]);
				} 
				else if (sizeof($output_array) != 0 && $rule["match"] == "match") 
				{
					array_push($errors, Craft::t('secure-passwords', 'Password') . ": " . $rule["message"]);
				}
			}
		}
		
		if ($this->settings->checkPwned && $this->haveIBeenPwned($password)) {
		{
			array_push($errors, Craft::t('secure-passwords', 'Password') . ": " . "This password has been Pwned!!!");
		}
		
		return $errors;
    }
    
    protected function settingRulesToArray($settingRules): array
    {
    	$outRules = [];
    	
    	foreach($settingRules as $rule) 
    	{
    		array_push($outRules, [
    		    "label" 	=> $rule[0],
    		    "message" 	=> $rule[1],
    		    "regex" 	=> $rule[2],
    		    "match" 	=> $rule[3],
    		    "active" 	=> $rule[4],
    		]);
    	}
    	
    	return $outRules;
    }
    
    protected function haveIBeenPwned(string $password) : bool
    {
        $hibp = HibpFactory::create();

        try {
            $pwnd = $hibp->isPwnedPassword($password);
        } catch (\Exception $e) {
            return false;
        }

        return $pwnd;
    }
}
