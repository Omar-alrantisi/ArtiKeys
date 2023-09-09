<?php

namespace App\Domains\Subscription\Services;
use App\Domains\Subscription\Models\CodeChallengeSubmission;
use App\Services\BaseService;
use App\Services\StorageManagerService;

class CodeChallengeSubmissionService extends BaseService
{
    /**
     * @var string
     */
    protected $entityName = 'CodeChallengeSubmission';

    /**
     * @param CodeChallengeSubmission $codeChallengeSubmission
     */
    public function __construct(CodeChallengeSubmission $codeChallengeSubmission,StorageManagerService $storageManagerService){
        $this->model = $codeChallengeSubmission;
        $this->storageManagerService = $storageManagerService;
    }
    public function store(array $data = [])
    {
        if (!empty($data['css_certificate'])) {
            try {
                $data = $this->uploadMedia($data, 'css_certificate', 'codeChallengeSubmission/images/css_certificate');
            } catch (\Exception $e) {
                throw $e;
            }
        }
        if (!empty($data['html_certificate'])) {
            try {
                $data = $this->uploadMedia($data, 'html_certificate', 'codeChallengeSubmission/images/html_certificate');
            } catch (\Exception $e) {
                throw $e;
            }
        }
        if (!empty($data['js_certificate'])) {
            try {
                $data = $this->uploadMedia($data, 'js_certificate', 'codeChallengeSubmission/images/js_certificate');
            } catch (\Exception $e) {
                throw $e;
            }
        }
        $data['user_id'] = auth()->id();
        $data['created_by_id'] = 1;
        $data['updated_by_id'] = 1;
        return parent::store($data);
    }
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
