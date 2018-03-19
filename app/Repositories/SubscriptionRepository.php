<?php

namespace App\Repositories;

use App\Models\Subscription;
use InfyOm\Generator\Common\BaseRepository;

/**
 * Class SubscriptionRepository
 * @package App\Repositories
 * @version March 19, 2018, 5:41 pm UTC
 *
 * @method Subscription findWithoutFail($id, $columns = ['*'])
 * @method Subscription find($id, $columns = ['*'])
 * @method Subscription first($columns = ['*'])
*/
class SubscriptionRepository extends BaseRepository
{
    /**
     * @var array
     */
    protected $fieldSearchable = [
        'title',
        'description',
        'price',
        'trial'
    ];

    /**
     * Configure the Model
     **/
    public function model()
    {
        return Subscription::class;
    }
}
