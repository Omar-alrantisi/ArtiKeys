<?php

namespace App\Domains\Page\Services;

use App\Domains\Page\Models\Page;
use App\Exceptions\GeneralException;
use App\Services\BaseService;
use App\Services\StorageManagerService;

/**
 * Class PageService
 */
class PageService extends BaseService
{

    /**
     * @var $entityName
     */
    protected $entityName = 'Page';

    /**
     * @param Page $page
     */
    public function __construct(Page $page,StorageManagerService $storageManagerService)
    {
        $this->model = $page;
        $this->storageManagerService = $storageManagerService;
    }

    /**
     * @param $slug
     * @return mixed
     */
    public function bySlug($slug)
    {
        return $this->model::bySlug($slug);
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
        $page = $this->getById($entity);

        if(!empty($data['image']) && request()->hasFile('image')){
            try {
                $this->storageManagerService->deletePublicFile($page->image,'page/images');

                $this->upload($data,'image','page/images',$page->image);

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
    private function upload(array &$data, $fileColumn, string $directory = 'page/images',$old_file_name = null): array
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
