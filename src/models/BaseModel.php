<?php


namespace ronashdkl\kodCms\models;


use ronashdkl\kodCms\components\FieldConfig;
use ronashdkl\kodCms\models\service\FaqListModel;
use ronashdkl\kodCms\modules\admin\exceptions\FileNotFoundException;
use ronashdkl\kodCms\modules\admin\exceptions\PropertyException;
use ronashdkl\kodCms\modules\admin\models\Log;
use phpDocumentor\Reflection\Types\This;
use yii\base\Model;
use yii\base\NotSupportedException;
use yii\helpers\ArrayHelper;
use yii\helpers\Json;
use yii\helpers\VarDumper;

/**
 * Class BaseModel
 * @package ronashdkl\kodCms\models
 * @property string $editorTheme
 * @property ListModel $listModel
 * @property StyleModel $styleModel
 * @property FieldConfig $fieldType
 * @property mixed $nameOfClass
 */
abstract class BaseModel extends Model implements ModelInterface
{
   public  static $_instance;
    const EVENT_INIT = 'event_init';
    protected $isMultilanguage = true;
    protected $fieldType;
    protected $loadFromDb = false;
    protected $db;

    public $listAttribute = null;
    public $listClass = null;

    public $styleAttribute = null;
    public $styleClass = null;

    public $title;
    public $summary;


    /**
     * @throws PropertyException
     */
    public function init()
    {
        parent::init();
        $this->trigger(self::EVENT_INIT);
        if (!$this->loadFromDb) {
            $this->loadFile();
        } else {
            $this->loadFromDb();
        }
        $this->fieldType = new FieldConfig();
    }


    public function rules()
    {
        return ArrayHelper::merge(parent::rules(), [
            [['title', 'summary'], 'required']
        ]);
    }


    public function formTypes()
    {
        return [
            'title' => [
                // 'value' => $this->text,
                'type' => FieldConfig::INPUT,
            ],
            'summary' => [
                // 'value' => $this->text,
                'type' => FieldConfig::CKEDITOR,
            ],
        ];


    }

    /**
     * @throws PropertyException
     * @throws FileNotFoundException
     */
    protected function loadFile()
    {

        try {
            $file = \Yii::$app->modelJson->read($this->fileName());
            $this->setAttributes($this->getJsonData(true));
        } catch (\League\Flysystem\FileNotFoundException $exception) {
            //if (YII_APP_ID == 2) {
            $contents = json_encode($this->getAttributes($this->safeAttributes()));
            file_put_contents(\Yii::getAlias('@app/storage/data/' . $this->fileName()), $contents);
            /*} else {
                throw new FileNotFoundException($this->fileName() . ' Not found');
            }*/
        }

        $this->loadList();
        $this->loadStyle();
    }

    /**
     * @throws PropertyException
     * @throws FileNotFoundException
     */
    protected function loadFromDb()
    {
        $this->db = JsonDb::find()->name($this->fileName());
        if ($this->db != null) {
            $this->setAttributes($this->db->getData());
        } else {
            $data = $this->getAttributes($this->safeAttributes());
            $this->db = new JsonDb();
            $this->db->name = $this->fileName();
            $this->db->data = $data;
            $this->db->save(false);
        }

        $this->loadList();
        $this->loadStyle();
    }

    /**
     * @param bool $fromSource
     * @return mixed
     */
    public function getJsonData($fromSource = false, $fromDB=false)
    {

        if ($fromSource) {
            $file = \Yii::$app->modelJson->read($this->fileName());
            return Json::decode($file);
        }

        if($fromDB){
            return $this->db->getData();
        }

        return json_encode($this->getAttributes($this->safeAttributes()));
    }

    /**
     * @throws PropertyException
     */
    protected function loadList()
    {
        if ( $this->listAttribute ==null) {
            return;
        }
        if ($this->listClass == null) {
            throw new PropertyException('Please declare $listClass on ' . get_called_class());
        }

        $lists = $this->{$this->listAttribute};
        if (!is_array($lists)) {
            return;
        }
        if (count($lists) <= 0) {
            return;
        }
        $this->setAttributes([$this->listAttribute => null]);
        foreach ($lists as $i => $list) {
            $this->{$this->listAttribute}[$i] = $this->listModel;
            $this->{$this->listAttribute}[$i]->setAttributes($list);
        }
    }

    protected function loadStyle()
    {
        if ($this->styleAttribute==null) {
            return;
        }
        if ($this->styleClass == null) {
            throw new PropertyException('Please declare $styleClass on ' . get_called_class());
        }

        $style = $this->{$this->styleAttribute};
        $this->setAttributes([$this->styleAttribute => new $this->styleClass($style)]);

    }

    public function fileName($language = null)
    {
        $path = explode('\\', get_called_class());
        $class = array_pop($path);
        $name = str_replace('Model', '', $class);
        if($language==null){
            $language = \Yii::$app->language;
        }
        if ($this->isMultilanguage) {
            return strtolower($name) . '_' . strtolower($language) . '.json';
        } else {
            return strtolower($name) . '.json';
        }
    }

    public function getNameOfClass()
    {
        $path = explode('\\', get_called_class());
        return array_pop($path);
    }


    /**
     * Delete single list
     * @param $key
     * @return bool|void
     */
    public function deleteList($key)
    {
        if ($key == null) {
            return;
        }
        $log = new Log([
            'log' => " force deleted from " . $this->getNameOfClass() . " List",
        ]);
        $log->detail['changedAttributes'] = $this->{$this->listAttribute}[$key];
        $log->save();

        unset($this->{$this->listAttribute}[$key]);
        $this->{$this->listAttribute} = array_values($this->{$this->listAttribute});
        return $this->save();
    }

    /**
     * Bulk Delete list
     * @param $keys
     * @return bool|void
     */
    public function deleteLists($keys)
    {
        if ($keys == null) {
            return;
        }

        foreach ($keys as $key) {
            $log = new Log([
                'log' => " Bull deleted from " . $this->getNameOfClass() . " List",
            ]);
            $log->detail['changedAttributes'] = $this->{$this->listAttribute}[$key];
            $log->save();

            unset($this->{$this->listAttribute}[$key]);

        }
        $this->{$this->listAttribute} = array_values($this->{$this->listAttribute});

        return $this->save();
    }


    public function save()
    {

        if ($this->validate()) {
            if ($this->loadFromDb) {
                $this->db->data = $this->getAttributes($this->safeAttributes());
                return $this->db->save();
            }
            return \Yii::$app->modelJson->put($this->fileName(), Json::encode($this->getAttributes($this->safeAttributes())));

        } else {
            return false;
        }
    }

    /**
     * @return ListModel $listModel
     * @throws NotSupportedException
     * @throws PropertyException
     */
    public function getListModel()
    {
        if ($this->listAttribute!=null) {
            if ($this->listClass == null) {
                throw new PropertyException('Please declare $listClass on ' . get_called_class());
            }
            return new $this->listClass();

        }
    }

    /**
     * @return StyleModel
     * @throws NotSupportedException
     * @throws PropertyException
     */
    public function getStyleModel()
    {
        if ($this->styleAttribute!=null) {
            if ($this->styleClass == null) {
                throw new PropertyException('Please declare $styleClass on ' . get_called_class());
            }
            return new $this->styleClass();
        }
    }

    public static function getInstance()
    {

        $class = get_called_class();
        if ( ! ( self::$_instance instanceof $class) ) {
            $class = get_called_class();
            self::$_instance =  new $class();
        }
        return self::$_instance;
    }

}
