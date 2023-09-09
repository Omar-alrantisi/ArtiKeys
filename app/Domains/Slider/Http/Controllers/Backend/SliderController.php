<?php
namespace App\Domains\Slider\Http\Controllers\Backend;
use App\Domains\Slider\Http\Requests\Backend\SliderRequest;
use App\Domains\Slider\Services\SliderService;
use App\Domains\Slider\Models\Slider;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
class SliderController extends Controller
{
    protected $modelType = Slider::class;

    /**
     * @param SliderService $sliderService
     */
    public function __construct(SliderService $sliderService)
    {
        $this->sliderService = $sliderService;
    }
    /**
     * @return \Illuminate\Contracts\Foundation\Application|\Illuminate\Contracts\View\Factory|\Illuminate\Contracts\View\View
     */
    public function index()
    {
        return view('backend.slider.index');
    }
    /**
     * @return \Illuminate\Contracts\Foundation\Application|\Illuminate\Contracts\View\Factory|\Illuminate\Contracts\View\View
     */
    public function create()
    {return view('backend.slider.create');
    }
    /**
     * @param SliderRequest $request
     * @return mixed
     * @throws \App\Exceptions\GeneralException
     * @throws \Throwable
     */
    public function store(SliderRequest $request)
    {
        $this->sliderService->store($request->validated());
        return redirect()->route('admin.slider.index')->withFlashSuccess(__('The slider was successfully added'));
    }

    /**
     * @param Slider $slider
     * @return mixed
     */
    public function edit(Slider $slider)
    {
        return view('backend.slider.edit')
            ->withSlider($slider);
    }
    public function editTranslation(Slider $slider)
    {
        return view('backend.slider.translate')
            ->withSlider($slider);
    }
    /**
     * @param SliderRequest $request
     * @param $slider
     * @return mixed
     * @throws \App\Exceptions\GeneralException
     * @throws \Throwable
     */
    public function update(SliderRequest $request, $slider)
    {
        $this->sliderService->update($slider, $request->validated());
        return redirect()->back()->withFlashSuccess(__('The slider was successfully updated'));
    }
    /**
     * @param $slider
     * @return mixed
     * @throws \App\Exceptions\GeneralException
     * @throws \Throwable
     */
    public function destroy($slider)
    {
        $this->sliderService->destroy($slider);
        return redirect()->back()->withFlashSuccess(__('The slider was successfully deleted.'));
    }
    public function updateStatus(Request $request)
    {
        $this->sliderService->updateStatus($request->input('sliderId'));
        return response()->json(true);
    }
}
