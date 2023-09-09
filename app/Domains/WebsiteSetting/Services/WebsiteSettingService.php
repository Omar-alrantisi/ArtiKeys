<?php

namespace App\Domains\WebsiteSetting\Services;
use App\Domains\Setting\Models\Setting;
use App\Domains\WebsiteSetting\Models\WebsiteSetting;
use App\Exceptions\GeneralException;
use App\Services\BaseService;
use App\Services\StorageManagerService;
use Illuminate\Http\Request;

/**
 * Class WebsiteSetting
 */
class WebsiteSettingService extends BaseService
{

    /**
     * @var $entityName
     */
    protected $entityName = 'WebsiteSetting';

    /**
     * @param WebsiteSetting $websiteSetting
     */
    public function __construct(WebsiteSetting $websiteSetting,StorageManagerService $storageManagerService)
    {
        $this->model = $websiteSetting;
        $this->storageManagerService = $storageManagerService;

    }
    /**
     * @param $entity
     * @param array $data
     * @return \Illuminate\Database\Eloquent\Model
     * @throws GeneralException
     * @throws \Throwable
     */
    public function update($entity, array $data = [])
    {
        $data = array_filter($data);
        $webSetting = $this->getById($entity);
        if(!empty($data['logo']) && request()->hasFile('logo')){
            try {
                $this->storageManagerService->deletePublicFile($webSetting->logo,'webSetting/logos');

                $this->upload($data,'logo','webSetting/logos',$webSetting->logo);

            } catch (\Exception $e) {
                throw $e;
            }
        }
        if(!empty($data['favicon']) && request()->hasFile('favicon')){
            try {
                $this->storageManagerService->deletePublicFile($webSetting->favicon,'webSetting/favicons');

                $this->upload($data,'favicon','webSetting/favicons',$webSetting->favicon);

            } catch (\Exception $e) {
                throw $e;
            }
        }
        return parent::update($entity, $data);
    }
    /**
     * @param array $data
     * @param $fileColumn
     * @param string $directory
     * @return array
     * @throws \Exception
     */
    private function upload(array &$data, $fileColumn, string $directory = 'webSetting/logos',$old_file_name = null): array
    {
        try{
            $data[$fileColumn] = $this->storageManagerService->uploadPublicFile($data[$fileColumn],$directory,$old_file_name);
            return $data;
        }
        catch (\Exception $exception){
            throw $exception;
        }
    }
}
