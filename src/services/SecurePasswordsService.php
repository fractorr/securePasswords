<?php
/**
 * Secure Passwords plugin for Craft CMS 3.x
 *
 * Make passwords as secure as you want
 *
 * @link      http://www.fractorr.net
 * @copyright Copyright (c) 2017 Trevor Orr
 */

namespace fractorr\securepasswords\services;

use fractorr\securepasswords\SecurePasswords;

use Craft;
use craft\base\Component;

/**
 * SecurePasswordsService Service
 *
 * All of your plugin’s business logic should go in services, including saving data,
 * retrieving data, etc. They provide APIs that your controllers, template variables,
 * and other plugins can interact with.
 *
 * https://craftcms.com/docs/plugins/services
 *
 * @author    Trevor Orr
 * @package   SecurePasswords
 * @since     1.0.0
 */
class SecurePasswordsService extends Component
{
    // Public Methods
    // =========================================================================

    /**
     * This function can literally be anything you want, and you can have as many service
     * functions as you want
     *
     * From any other plugin file, call it like this:
     *
     *     SecurePasswords::$plugin->securePasswordsService->exampleService()
     *
     * @return mixed
     */
    public function exampleService()
    {
        $result = 'something';
        // Check our Plugin's settings for `someAttribute`
        if (SecurePasswords::$plugin->getSettings()->someAttribute) {
        }

        return $result;
    }
}
