<?php

namespace ronashdkl\kodCms\modules\admin\exceptions;

use ReflectionException;
use yii\base\Exception;

/**
 * Class PropertyException
 * @package ronashdkl\kodCms\modules\admin\Exception
 */
class FileNotFoundException extends Exception
{
    public function getName()
    {
        return 'Data File Not Found';
    }
}
