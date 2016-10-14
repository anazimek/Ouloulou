<?php
namespace App\Test\TestCase\Controller;

use App\Controller\UserMessagesController;
use Cake\TestSuite\IntegrationTestCase;

/**
 * App\Controller\UserMessagesController Test Case
 */
class UserMessagesControllerTest extends IntegrationTestCase
{

    /**
     * Fixtures
     *
     * @var array
     */
    public $fixtures = [
        'app.user_messages',
        'app.users',
        'app.ads',
        'app.type_ads',
        'app.towns',
        'app.ad_images',
        'app.ad_messages',
        'app.articles',
        'app.user_images'
    ];

    /**
     * Test index method
     *
     * @return void
     */
    public function testIndex()
    {
        $this->markTestIncomplete('Not implemented yet.');
    }

    /**
     * Test view method
     *
     * @return void
     */
    public function testView()
    {
        $this->markTestIncomplete('Not implemented yet.');
    }

    /**
     * Test add method
     *
     * @return void
     */
    public function testAdd()
    {
        $this->markTestIncomplete('Not implemented yet.');
    }

    /**
     * Test edit method
     *
     * @return void
     */
    public function testEdit()
    {
        $this->markTestIncomplete('Not implemented yet.');
    }

    /**
     * Test delete method
     *
     * @return void
     */
    public function testDelete()
    {
        $this->markTestIncomplete('Not implemented yet.');
    }
}
