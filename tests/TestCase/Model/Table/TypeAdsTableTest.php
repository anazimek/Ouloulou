<?php
namespace App\Test\TestCase\Model\Table;

use App\Model\Table\TypeAdsTable;
use Cake\ORM\TableRegistry;
use Cake\TestSuite\TestCase;

/**
 * App\Model\Table\TypeAdsTable Test Case
 */
class TypeAdsTableTest extends TestCase
{

    /**
     * Test subject
     *
     * @var \App\Model\Table\TypeAdsTable
     */
    public $TypeAds;

    /**
     * Fixtures
     *
     * @var array
     */
    public $fixtures = [
        'app.type_ads',
        'app.ads',
        'app.users',
        'app.towns',
        'app.ad_images',
        'app.ad_messages'
    ];

    /**
     * setUp method
     *
     * @return void
     */
    public function setUp()
    {
        parent::setUp();
        $config = TableRegistry::exists('TypeAds') ? [] : ['className' => 'App\Model\Table\TypeAdsTable'];
        $this->TypeAds = TableRegistry::get('TypeAds', $config);
    }

    /**
     * tearDown method
     *
     * @return void
     */
    public function tearDown()
    {
        unset($this->TypeAds);

        parent::tearDown();
    }

    /**
     * Test initialize method
     *
     * @return void
     */
    public function testInitialize()
    {
        $this->markTestIncomplete('Not implemented yet.');
    }

    /**
     * Test validationDefault method
     *
     * @return void
     */
    public function testValidationDefault()
    {
        $this->markTestIncomplete('Not implemented yet.');
    }
}
