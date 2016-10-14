<?php
namespace App\Test\TestCase\Model\Table;

use App\Model\Table\ArticesTable;
use Cake\ORM\TableRegistry;
use Cake\TestSuite\TestCase;

/**
 * App\Model\Table\ArticesTable Test Case
 */
class ArticesTableTest extends TestCase
{

    /**
     * Test subject
     *
     * @var \App\Model\Table\ArticesTable
     */
    public $Artices;

    /**
     * Fixtures
     *
     * @var array
     */
    public $fixtures = [
        'app.artices',
        'app.users'
    ];

    /**
     * setUp method
     *
     * @return void
     */
    public function setUp()
    {
        parent::setUp();
        $config = TableRegistry::exists('Artices') ? [] : ['className' => 'App\Model\Table\ArticesTable'];
        $this->Artices = TableRegistry::get('Artices', $config);
    }

    /**
     * tearDown method
     *
     * @return void
     */
    public function tearDown()
    {
        unset($this->Artices);

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

    /**
     * Test buildRules method
     *
     * @return void
     */
    public function testBuildRules()
    {
        $this->markTestIncomplete('Not implemented yet.');
    }
}
