<?php

namespace App\Repositories;

use App\Models\Example;
use InfyOm\Generator\Common\BaseRepository;

/**
 * Class ExampleRepository
 * @package App\Repositories
 * @version April 12, 2018, 1:58 pm UTC
 *
 * @method Example findWithoutFail($id, $columns = ['*'])
 * @method Example find($id, $columns = ['*'])
 * @method Example first($columns = ['*'])
*/
class ExampleRepository extends BaseRepository
{
    /**
     * @var array
     */
    protected $fieldSearchable = [
        'title',
        'post_date',
        'email'
    ];

    /**
     * Configure the Model
     **/
    public function model()
    {
        return Example::class;
    }
}
