<?php
namespace app\models;
use yii\base\Model;
use yii\web\UploadedFile;
use Yii;
class ImageUpload extends Model
{
    /**
     * @var UploadedFile
     */
    public $image;

    public function rules()
    {
        return [
            [['image'],'required'],
            [['image'], 'file',  'extensions' => 'png, jpg'],
        ];
    }

    public function uploadFile($file,$currentImage)
    {
        $this->image = $file;
        if ($this->validate()) {
         $this->deleteCurrentImage($currentImage);
         return $this->saveImage();
        }
    }

    private function getfolder()
    {
        return Yii::getAlias('@web') . 'uploads/' ;
    }

   private function generateFileName()
    {
        return md5(uniqid($this->image->baseName)) . '.' . $this->image->extension;
    }

    public function deleteCurrentImage($currentImage)
    {
        if ($this->fileExists($currentImage)) {
            unlink($this->getfolder() . $currentImage);
        }
    }
    private function fileExists($currentImage)
    {
        if(!empty($currentImage) && $currentImage !=null){
            return file_exists($this->getfolder() . $currentImage);
        }

    }
    private function saveImage()
    {
          $filename = $this->generateFileName();
          $this->image->saveAs($this->getfolder() . $filename);
          return $filename;
    }
}













