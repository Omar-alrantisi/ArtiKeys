<?php

namespace App\Domains\Subscription\Services;
use App\Domains\Subscription\Models\PersonalQuestion;
use App\Domains\Subscription\Models\UserEnglishTest;
use App\Services\BaseService;
use App\Services\StorageManagerService;

class UserEnglishTestService extends BaseService
{
    /**
     * @var string
     */
    protected $entityName = 'UserEnglishTest';

    /**
     * @param UserEnglishTest $userEnglishTest
     */
    public function __construct(UserEnglishTest $userEnglishTest,StorageManagerService $storageManagerService){
        $this->model = $userEnglishTest;
        $this->storageManagerService = $storageManagerService;
    }
    public function store(array $data = [])
    {
        if (!empty($data['image'])) {
            try {
                $data = $this->uploadMedia($data, 'image', 'englishTest/images');

            } catch (\Exception $e) {
                throw $e;
            }
        }
        $data['user_id'] = auth()->id();
        $data['created_by_id'] = 1;
        $data['updated_by_id'] = 1;
        return parent::store($data);
    }
    /**
     * @param array $data
     * @param $fileColumn
     * @param $directory
     * @return array
     * @throws \Exception
     */
    private function uploadMedia(array &$data, $fileColumn, $directory): array
    {
        try{
            $data[$fileColumn] = $this->storageManagerService->uploadPublicFile($data[$fileColumn],$directory);
            return $data;
        }
        catch (\Exception $exception){
            throw $exception;
        }
    }
}
