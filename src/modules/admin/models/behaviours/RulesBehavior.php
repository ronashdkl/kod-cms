<?php
/**
 * Created by PhpStorm.
 * User: ronash
 * Date: 2018-11-07
 * Time: 02:25
 */

namespace ronashdkl\kodCms\modules\admin\models\behaviours;


use yii\base\Behavior;
use yii\base\InvalidConfigException;
use yii\validators\Validator;

class RulesBehavior extends Behavior
{

    public  $rules = [];
    public  $validators = [];
    /**
     * @inheritdoc
     */
    public function attach($owner)
    {
        parent::attach($owner);
        $validators = $owner->validators;
        foreach ($this->rules as $rule) {
            if ($rule instanceof Validator) {
                $validators->append($rule);
                $this->validators[] = $rule; // keep a reference in behavior
            } elseif (is_array($rule) && isset($rule[0], $rule[1])) { // attributes, validator type
                $validator = Validator::createValidator($rule[1], $owner, (array)$rule[0], array_slice($rule, 2));
                $validators->append($validator);
                $this->validators[] = $validator; // keep a reference in behavior
            } else {
                throw new InvalidConfigException('Invalid validation rule: a rule must specify both attribute names and validator type.');
            }
        }
    }

    /**
     * @inheritdoc
     */
    public function detach()
    {
        $ownerValidators = $this->owner->validators;
        $cleanValidators = [];
        foreach ($ownerValidators as $validator) {
            if (!in_array($validator, $this->validators)) {
                $cleanValidators[] = $validator;
            }
        }
        $ownerValidators->exchangeArray($cleanValidators);
    }
}