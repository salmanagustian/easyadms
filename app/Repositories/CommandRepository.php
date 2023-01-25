<?php

namespace App\Repositories;

use App\Models\Command;
use App\Repositories\BaseRepository;

/**
 * Class CommandRepository
 * @package App\Repositories
 * @version January 25, 2023, 11:02 am WIB
*/

class CommandRepository extends BaseRepository
{
    /**
     * @var array
     */
    protected $fieldSearchable = [
        'device_id',
        'command',
        'status'
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
        return Command::class;
    }
}
