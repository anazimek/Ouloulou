<?php
namespace App\Model\Table;

use Cake\ORM\Query;
use Cake\ORM\RulesChecker;
use Cake\ORM\Table;
use Cake\Validation\Validator;

/**
 * Ads Model
 *
 * @property \Cake\ORM\Association\BelongsTo $Users
 * @property \Cake\ORM\Association\BelongsTo $TypeAds
 * @property \Cake\ORM\Association\BelongsTo $Towns
 * @property \Cake\ORM\Association\HasMany $AdImages
 * @property \Cake\ORM\Association\HasMany $AdMessages
 *
 * @method \App\Model\Entity\Ad get($primaryKey, $options = [])
 * @method \App\Model\Entity\Ad newEntity($data = null, array $options = [])
 * @method \App\Model\Entity\Ad[] newEntities(array $data, array $options = [])
 * @method \App\Model\Entity\Ad|bool save(\Cake\Datasource\EntityInterface $entity, $options = [])
 * @method \App\Model\Entity\Ad patchEntity(\Cake\Datasource\EntityInterface $entity, array $data, array $options = [])
 * @method \App\Model\Entity\Ad[] patchEntities($entities, array $data, array $options = [])
 * @method \App\Model\Entity\Ad findOrCreate($search, callable $callback = null)
 *
 * @mixin \Cake\ORM\Behavior\TimestampBehavior
 */
class AdsTable extends Table
{

    /**
     * Initialize method
     *
     * @param array $config The configuration for the Table.
     * @return void
     */
    public function initialize(array $config)
    {
        parent::initialize($config);

        $this->table('ads');
        $this->displayField('id');
        $this->primaryKey('id');

        $this->addBehavior('Timestamp');

        $this->belongsTo('Users', [
            'foreignKey' => 'user_id',
            'joinType' => 'INNER'
        ]);
        $this->belongsTo('TypeAds', [
            'foreignKey' => 'type_ad_id',
            'joinType' => 'INNER'
        ]);
        $this->belongsTo('Towns', [
            'foreignKey' => 'town_id',
            'joinType' => 'INNER'
        ]);
        $this->hasMany('AdImages', [
            'foreignKey' => 'ad_id'
        ]);
        $this->hasMany('AdMessages', [
            'foreignKey' => 'ad_id'
        ]);
    }

    /**
     * Default validation rules.
     *
     * @param \Cake\Validation\Validator $validator Validator instance.
     * @return \Cake\Validation\Validator
     */
    public function validationDefault(Validator $validator)
    {
        $validator
            ->integer('id')
            ->allowEmpty('id', 'create');

        $validator
            ->boolean('for_rent')
            ->requirePresence('for_rent', 'create')
            ->notEmpty('for_rent');

        $validator
            ->boolean('for_sale')
            ->requirePresence('for_sale', 'create')
            ->notEmpty('for_sale');

        $validator
            ->integer('price')
            ->requirePresence('price', 'create')
            ->notEmpty('price');

        $validator
            ->requirePresence('description', 'create')
            ->notEmpty('description');

        $validator
            ->requirePresence('ads_name', 'create')
            ->notEmpty('ads_name');

        $validator
            ->allowEmpty('picture_url');

        return $validator;
    }

    /**
     * Returns a rules checker object that will be used for validating
     * application integrity.
     *
     * @param \Cake\ORM\RulesChecker $rules The rules object to be modified.
     * @return \Cake\ORM\RulesChecker
     */
    public function buildRules(RulesChecker $rules)
    {
        $rules->add($rules->existsIn(['user_id'], 'Users'));
        $rules->add($rules->existsIn(['type_ad_id'], 'TypeAds'));
        $rules->add($rules->existsIn(['town_id'], 'Towns'));

        return $rules;
    }
}
