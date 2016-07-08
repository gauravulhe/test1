<?php
namespace App\Model\Entity;

use Cake\ORM\Entity;

/**
 * City Entity.
 *
 * @property int $id
 * @property int $country_id
 * @property \App\Model\Entity\Country $country
 * @property int $state_id
 * @property \App\Model\Entity\State $state
 * @property string $city
 * @property \Cake\I18n\Time $created
 * @property \Cake\I18n\Time $modified
 * @property \App\Model\Entity\Member[] $members
 */
class City extends Entity
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
}