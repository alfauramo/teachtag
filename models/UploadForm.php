<?php
namespace app\models;

use yii\base\Model;
use yii\web\UploadedFile;

class UploadForm extends Model
{
	/**
	 * @var UploadedFile
	 */
	public $fichero;

	public function rules()
	{
		return [
			[['fichero'], 'file', 'skipOnEmpty' => false],
		];
	}

	public function upload()
	{
		if ($this->validate()) {
			$this->fichero->saveAs('uploads/' . $this->fichero->baseName . '.' . $this->fichero->extension);
			return true;
		} else {
			return false;
		}
	}
}
?>
