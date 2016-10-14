<?php
namespace App\Model\Table;

use Cake\ORM\Query;
use Cake\ORM\RulesChecker;
use Cake\ORM\Table;
use Cake\Validation\Validator;

/**
 * Users Model
 *
 * @property \Cake\ORM\Association\BelongsTo $Sexes
 * @property \Cake\ORM\Association\HasMany $Ads
 * @property \Cake\ORM\Association\HasMany $Articles
 * @property \Cake\ORM\Association\HasMany $Comments
 * @property \Cake\ORM\Association\HasMany $UserImages
 * @property \Cake\ORM\Association\HasMany $UserMessages
 *
 * @method \App\Model\Entity\User get($primaryKey, $options = [])
 * @method \App\Model\Entity\User newEntity($data = null, array $options = [])
 * @method \App\Model\Entity\User[] newEntities(array $data, array $options = [])
 * @method \App\Model\Entity\User|bool save(\Cake\Datasource\EntityInterface $entity, $options = [])
 * @method \App\Model\Entity\User patchEntity(\Cake\Datasource\EntityInterface $entity, array $data, array $options = [])
 * @method \App\Model\Entity\User[] patchEntities($entities, array $data, array $options = [])
 * @method \App\Model\Entity\User findOrCreate($search, callable $callback = null)
 *
 * @mixin \Cake\ORM\Behavior\TimestampBehavior
 */
class UsersTable extends Table
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

        $this->table('users');
        $this->displayField('id');
        $this->primaryKey('id');

        $this->addBehavior('Timestamp');

        $this->belongsTo('Sexes', [
            'foreignKey' => 'sexe_id'
        ]);
        $this->hasMany('Ads', [
            'foreignKey' => 'user_id'
        ]);
        $this->hasMany('Articles', [
            'foreignKey' => 'user_id'
        ]);
        $this->hasMany('Comments', [
            'foreignKey' => 'user_id'
        ]);
        $this->hasMany('UserImages', [
            'foreignKey' => 'user_id'
        ]);
        $this->hasMany('UserMessages', [
            'foreignKey' => 'user_id'
        ]);

        $this->addBehavior('Xety/Cake3Upload.Upload', [
                'fields' => [
                    'profil_picture' => [
                        'path' => 'img/:id'
                    ]
                ]
            ]
        );

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
            ->requirePresence('first_name', 'create')
            ->notEmpty('first_name');

        $validator
            ->requirePresence('last_name', 'create')
            ->notEmpty('last_name');

        $validator
            ->email('email')
            ->requirePresence('email', 'create')
            ->notEmpty('email');

        $validator
            ->date('birthday')
            ->requirePresence('birthday', 'create')
            ->notEmpty('birthday');

        $validator
            ->allowEmpty('city');

        $validator
            ->allowEmpty('description');

        $validator
            ->requirePresence('password', 'create')
            ->notEmpty('password');

        $validator
            ->allowEmpty('work');

        $validator
            ->allowEmpty('profil_picture');

        $validator
            ->allowEmpty('linkedin_link');

        $validator
            ->allowEmpty('website_link');

        $validator
            ->allowEmpty('study');

        $validator
            ->allowEmpty('hobbie');

        $validator
            ->requirePresence('username', 'create')
            ->notEmpty('username');

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
        $rules->add($rules->isUnique(['email']));
        $rules->add($rules->isUnique(['username']));
        $rules->add($rules->existsIn(['sexe_id'], 'Sexes'));

        return $rules;
    }
}
