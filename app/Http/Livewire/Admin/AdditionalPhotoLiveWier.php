<?php

namespace App\Http\Livewire\Admin;

use App\Models\Product;
use Illuminate\Contracts\View\View;
use Illuminate\Database\Eloquent\Collection;
use Illuminate\Validation\ValidationException;
use Livewire\Component;
use Livewire\WithFileUploads;
use Spatie\MediaLibrary\MediaCollections\Exceptions\FileDoesNotExist;
use Spatie\MediaLibrary\MediaCollections\Exceptions\FileIsTooBig;

class AdditionalPhotoLiveWier extends Component
{
    use WithFileUploads;

    public static string $media = 'additional_photo_product';

    public static string $mediaHover = 'ProductHover';

    public Product $product;

    public Collection|array $photos = [];

    public Collection|array $photoHover = [];

    public $file;

    public $fileHover;

    public int $random = 1;

    protected $listeners = ['refreshAdditionalPhotoLiveWier' => '$refresh'];

    /**
     * @return array
     */
    protected function rules(): array
    {
        return [
            'file' => [
                'max:2024',
                'mimes:jpeg,bmp,png,JPG,JPEG,webp',
            ],
        ];
    }

    /**
     * @param  $field
     * @return void
     *
     * @throws ValidationException
     */
    public function updated($field): void
    {
        $this->validateOnly($field);
    }

    /**
     * @param  $id
     * @return void
     */
    public function deleteImage($id): void
    {
        \Spatie\MediaLibrary\MediaCollections\Models\Media::findOrFail($id)->delete();

        $this->dispatchBrowserEvent('alert',
            ['type' => 'warning', 'message' => 'Фото удалено.']);

        $this->emit('refreshAdditionalPhotoLiveWier');
    }

    /**
     * @return void
     */
    public function updatedFile(): void
    {
        try {
            $this->product->addMedia($this->file)->toMediaCollection(self::$media);

            $this->dispatchBrowserEvent('alert',
                ['type' => 'success', 'message' => 'Фото удачно загружено']);
        } catch (FileDoesNotExist|FileIsTooBig $e) {
            \Log::error($e->getMessage());
            $this->dispatchBrowserEvent('alert',
                ['type' => 'errors', 'message' => 'Что то пошло не так, проверьте лог файлы ']);
        }

        $this->reset(['file']);

        $this->emit('refreshAdditionalPhotoLiveWier');
    }

    public function updatePhotoOrder($photoId, $order): void
    {
        $media = $this->product->getMedia(self::$media)->where('id', $photoId)->first();
        if ($media) {
            $media->order_column = $order;
            $media->save();
        }
        $this->photos = $this->product->getMedia(self::$media)->sortBy('order_column');
        $this->dispatchBrowserEvent('alert',
            ['type' => 'success', 'message' => 'Порядок фото успешно обновлено']);
    }

    /**
     * @return View
     */
    public function render(): View
    {
        $this->photos = $this->product->getMedia(self::$media)->sortBy('order_column') ?? [];
        $this->photoHover = $this->product->getMedia(self::$mediaHover) ?? [];

        return view('livewire.admin.additional-photo-live-wier');
    }
}
