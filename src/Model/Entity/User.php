<?php
namespace App\Model\Entity;

use Cake\Auth\DefaultPasswordHasher;
use Cake\ORM\Entity;

/**
 * User Entity
 *
 * @property int $id
 * @property string $first_name
 * @property string $last_name
 * @property string $email
 * @property \Cake\I18n\Time $birthday
 * @property string $city
 * @property string $description
 * @property string $password
 * @property int $sexe_id
 * @property string $work
 * @property string $profil_picture
 * @property string $linkedin_link
 * @property string $website_link
 * @property \Cake\I18n\Time $created
 * @property \Cake\I18n\Time $modified
 * @property string $study
 * @property string $hobbie
 * @property string $username
 *
 * @property \App\Model\Entity\Sex $sex
 * @property \App\Model\Entity\Ad[] $ads
 * @property \App\Model\Entity\Article[] $articles
 * @property \App\Model\Entity\Comment[] $comments
 * @property \App\Model\Entity\UserImage[] $user_images
 * @property \App\Model\Entity\UserMessage[] $user_messages
 */
class User extends Entity
{

    /**
     * Fields that can be mass assigned using newEntity() or patchEntity().
     *
     * Note that when '*' is set to true, this allows all unspecified fields to
     * be mass assigned. For security purposes, it is advised to set '*' to false
     * (or remove it), and explicitly make individual fields accessible as needed.
     *
     * @var array
     */
    protected $_accessible = [
        '*' => true,
        'id' => false
    ];

    /**
     * Fields that are excluded from JSON versions of the entity.
     *
     * @var array
     */
    protected $_hidden = [
        'password'
    ];

    protected function _setPassword($password)
    {
        return (new DefaultPasswordHasher)->hash($password);
    }
}