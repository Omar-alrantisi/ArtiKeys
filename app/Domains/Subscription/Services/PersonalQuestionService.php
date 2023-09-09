<?php

namespace App\Domains\Subscription\Services;
use App\Domains\Subscription\Models\PersonalQuestion;
use App\Services\BaseService;
class PersonalQuestionService extends BaseService
{
    /**
     * @var string
     */
    protected $entityName = 'PersonalQuestion';

    /**
     * @param PersonalQuestion $personalQuestion
     */
    public function __construct(PersonalQuestion $personalQuestion){
        $this->model = $personalQuestion;
    }
    public function store(array $data = [])
    {
        $data['user_id'] = auth()->id();
        $data['created_by_id'] = 1;
        $data['updated_by_id'] = 1;
        return parent::store($data);
    }
}
