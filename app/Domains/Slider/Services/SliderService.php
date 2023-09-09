<?php
namespace App\Domains\Slider\Services;
use App\Domains\Slider\Models\Slider;
use App\Services\BaseService;
use App\Services\StorageManagerService;
use App\Exceptions\GeneralException;
class SliderService extends BaseService
{
    /**
     * @var string $entityName
     */
    protected $entityName = 'Slider';
    /**
     * @var StorageManagerService $storageManagerService
     */
    protected $storageManagerService;
    /**
     * @param Slider $slider
     * @param StorageManagerService $storageManagerService
     */
    public function __construct(Slider $slider, StorageManagerService $storageManagerService)
    {
        $this->model = $slider;
        $this->storageManagerService = $storageManagerService;
    }
    /**
     * @param array $data
     * @return mixed
     * @throws GeneralException
     * @throws \Throwable
     */
    public function store(array $data = [])
    {
        if(!empty($data['image']) && request()->hasFile('image')){
            try {
                $this->upload($data,'image');
            } catch (\Exception $e) {
                throw $e;
            }
        }
        $data['created_by_id']=1;
        $data['updated_by_id']=1;
        return parent::store($data);
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
        $slider = $this->getById($entity);
        if(!empty($data['image']) && request()->hasFile('image')){
            try {
                $this->storageManagerService->deletePublicFile($slider->image,'slider/images');

                $this->upload($data,'image','slider/images',$slider->image);

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
    private function upload(array &$data, $fileColumn, string $directory = 'slider/images',$old_file_name = null): array
    {
        try{
            $data[$fileColumn] = $this->storageManagerService->uploadPublicFile($data[$fileColumn],$directory,$old_file_name);
            return $data;
        }
        catch (\Exception $exception){
            throw $exception;
        }
    }
    public function updateStatus($sliderId)
    {

        $slider = Slider::query()->findOrFail($sliderId);
        if($slider->status=="1"){
            $slider->status ="0";
        }
        else{
            $slider->status = "1";
        }
        $slider->update();
    }
}
