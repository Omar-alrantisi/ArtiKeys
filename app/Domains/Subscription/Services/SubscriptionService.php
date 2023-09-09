<?php

namespace App\Domains\Subscription\Services;
use App\Domains\Auth\Models\User;
use App\Mail\NewUserApprovedMail;
use App\Services\BaseService;
use App\Domains\Subscription\Models\Subscription;
use App\Services\StorageManagerService;
use Illuminate\Support\Facades\Mail;

class SubscriptionService extends BaseService
{
    /**
     * @var string
     */
    protected $entityName = 'Subscription';

    /**
     * @var StorageManagerService $storageManagerService
     */
    protected StorageManagerService $storageManagerService;

    /**
     * @param Subscription $subscription
     * @param StorageManagerService $storageManagerService
     */
    public function __construct(Subscription $subscription, StorageManagerService $storageManagerService){
        $this->model = $subscription;
        $this->storageManagerService = $storageManagerService;
    }


    public function store(array $data = [])
    {
        if (!empty($data['personal_image'])) {
            try {
                $data = $this->uploadMedia($data, 'personal_image', 'subscription/personal_images');

            } catch (\Exception $e) {
                throw $e;
            }
        }
        if (!empty($data['identification_card'])) {
            try {
                $data = $this->uploadMedia($data, 'identification_card', 'subscription/identification_card');

            } catch (\Exception $e) {
                throw $e;
            }
        }
        if (!empty($data['vaccination_certificate'])) {
            try {
                $data = $this->uploadMedia($data, 'vaccination_certificate', 'subscription/vaccination_certificate');

            } catch (\Exception $e) {
                throw $e;
            }
        }
        $data['user_id'] = auth()->id();
        $data['created_by_id'] = 1;
        $data['updated_by_id'] = 1;
        $data['name_en']=$data['first_name_en'].' '.$data['second_name_en'].' '.$data['third_name_en'].' '.$data['last_name_en'];
        $data['name_ar']=$data['first_name_ar'].' '.$data['second_name_ar'].' '.$data['third_name_ar'].' '.$data['last_name_ar'];

        return parent::store($data);
    }
    /**
     * @param $entity
     * @param array $data
     * @return mixed
     * @throws \Exception
     */
    public function update($entity, array $data = [])
    {
        $business = $this->getById($entity);
        if(request()->hasFile('logo')){
            try {
                $this->deleteMedia($business,$business->logo,'business/logo');
                $data = $this->uploadMedia($data, 'logo','business/logo');
            } catch (\Exception $e) {
                throw $e;
            }
        }else{
            $data['logo'] = $business->logo;
        }
        return parent::update($entity, $data);
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


    /**
     * @param $fileName
     * @param $directory
     * @return bool
     * @throws \Exception
     */
    private function deleteMedia($fileName, $directory): bool
    {
        try{
            return $this->storageManagerService->deletePublicFile($fileName,$directory);
        }
        catch (\Exception $exception){
            throw $exception;
        }
    }
    public function updateStatus($userId)
    {
        $subscription = Subscription::findOrFail($userId);
        $subscription->status = ($subscription->status == "1") ? "0" : "1";
        $subscription->update();
        if ($subscription->status==1){
            $user=User::query()->where('id',$subscription->user_id)->first();
            $emailData = [
                'user' => [
                    'name' => $subscription->name_en,
                ],
            ];
            Mail::to($user->email)->send(new NewUserApprovedMail($emailData));
        }

    }


}
