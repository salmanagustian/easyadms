<?php

namespace App\Repositories;

use App\Models\Webhook;
use App\Repositories\BaseRepository;

/**
 * Class WebhookRepository
 * @package App\Repositories
 * @version January 27, 2023, 10:27 am WIB
*/

class WebhookRepository extends BaseRepository
{
    /**
     * @var array
     */
    protected $fieldSearchable = [
        'device_id',
        'url'
    ];

    /**
     * Return searchable fields
     *
     * @return array
     */
    public function getFieldsSearchable()
    {
        return $this->fieldSearchable;
    }

    /**
     * Configure the Model
     **/
    public function model()
    {
        return Webhook::class;
    }
}
