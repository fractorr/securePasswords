<?php
/**
 * Secure Passwords plugin for Craft CMS 3.x
 *
 * Make passwords as secure as you want
 *
 * @link      http://www.fractorr.com
 * @copyright Copyright (c) 2017 Trevor Orr
 */

namespace fractorr\securepasswords\models;

use fractorr\securepasswords\SecurePasswords;

use Craft;
use craft\base\Model;

/**
 * SecurePasswords Settings Model
 *
 * This is a model used to define the plugin's settings.
 *
 * Models are containers for data. Just about every time information is passed
 * between services, controllers, and templates in Craft, it’s passed via a model.
 *
 * https://craftcms.com/docs/plugins/models
 *
 * @author    Trevor Orr
 * @package   SecurePasswords
 * @since     1.0.0
 */
class Settings extends Model
{
    // Public Properties
    // =========================================================================

    /**
     * Some field model attribute
     *
     * @var string
     */
	public $passwordRules = '';
	public $checkPwned = true;
	
    // Public Methods
    // =========================================================================

    /**
     * Returns the validation rules for attributes.
     *
     * Validation rules are used by [[validate()]] to check if attribute values are valid.
     * Child classes may override this method to declare different validation rules.
     *
     * More info: http://www.yiiframework.com/doc-2.0/guide-input-validation.html
     *
     * @return array
     */
    public function rules()
    {
        return [
        ];
    }
}
