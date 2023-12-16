<?php

namespace App\Domains\Lookups\Services;


use App\Models\Test;
use App\Services\BaseService;

/**
 * Class CountryService
 */
class TestService extends BaseService
{

    /**
     * @var $entityName
     */
    protected $entityName = 'test';

    /**
     * @param Test $test
     */
    public function __construct(Test $test)
    {
        $this->model = $test;
    }
    public function store(array $data = [])
    {

        $data['created_by_id']=1;
        $data['updated_by_id']=1;
        return parent::store($data);
    }
}
