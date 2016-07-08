<?php
namespace App\Model\Entity;

use Cake\ORM\Entity;
use Cake\Auth\DefaultPasswordHasher;
/**
 * Member Entity.
 *
 * @property int $id
 * @property string $username
 * @property string $password
 * @property int $country_id
 * @property \App\Model\Entity\Country $country
 * @property int $state_id
 * @property \App\Model\Entity\State $state
 * @property int $city_id
 * @property \App\Model\Entity\City $city
 * @property \Cake\I18n\Time $created
 * @property \Cake\I18n\Time $modified
 */
class Member extends Entity
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
        'id' => false,
    ];

    /**
     * Fields that are excluded from JSON an array versions of the entity.
     *
     * @var array
     */
    protected $_hidden = [
        'password'
    ];

    /*
        password encryption 
    */
    protected function _setPassword($password){
        return (new DefaultPasswordHasher)->hash($password);
    }
}