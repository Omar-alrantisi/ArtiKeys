<?php

namespace App\Domains\Subscription\Services;
use App\Services\BaseService;
use App\Domains\Subscription\Models\SubscriptionInfo;
class SubscriptionInfoService extends BaseService
{
    /**
     * @var string
     */
    protected $entityName = 'SubscriptionInfo';

    /**
     * @param SubscriptionInfo $subscriptionInfo
     */
    public function __construct(SubscriptionInfo $subscriptionInfo){
        $this->model = $subscriptionInfo;
    }
    public function store(array $data = [])
    {
        $data['user_id'] = auth()->id();
        $data['created_by_id'] = 1;
        $data['updated_by_id'] = 1;
        return parent::store($data);
    }
}
