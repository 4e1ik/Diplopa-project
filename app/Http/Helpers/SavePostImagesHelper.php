<?php


namespace App\Http\Helpers;


use App\Models\Image;
use Illuminate\Support\Facades\Storage;

class SavePostImagesHelper
{

    public $file;
    public $data;

    public function __construct($file, $data)
    {

        $this->file = $file;
        $this->data = $data;
    }

    public function saveImage()
    {
        try {
            $name = $this->file->getClientOriginalName();
            $path = Storage::putFileAs('images', $this->file, $name); // Даем путь к этому файлу
            if ($this->file->clientExtension() != 'png'){
                throw new \Exception('Загруженное изображение некорректного формата. Верный формат: .png. Попробуйте другое изображение.Можно конвертировать ');
            }
            $changedImage = \Intervention\Image\Facades\Image::make($this->file)->resize(200,200, function($constrait){
                $constrait->aspectRatio();
            });
            $changedImage->save(Storage::path($path));
            $this->data['image'] = $path;
            $first = Image::query()->where('post_id', $this->data['post_id'])->min('updated_at');
            if (Image::query()->where('post_id', $this->data['post_id'])->count() >= 4){
                Image::query()->where('post_id', $this->data['post_id'])->where('updated_at', $first)->limit(1)->delete();
                return Image::create($this->data)->lazy();
            } else {
                return Image::create($this->data)->lazy();
            }
        } catch (\Exception $exception){
            return back()->withError($exception->getMessage())->withInput();
        }
    }
}
