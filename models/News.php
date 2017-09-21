<?php

namespace app\models;

use yii\db\ActiveRecord;

/**
 * @SWG\Definition(
 *   definition="CreateNews",
 *   type="object",
 *   required={"title", "content"},
 *   @SWG\Property(property="title", type="string"),
 *   @SWG\Property(property="content", type="string")
 * )
 */

/**
 * @SWG\Definition(
 *   definition="UpdateNews",
 *   type="object",
 *   required={"title", "content"},
 *   allOf={
 *       @SWG\Schema(ref="#/definitions/CreateNews"),
 *   }
 * )
 */

/**
 * @SWG\Definition(
 *   definition="News",
 *   type="object",
 *   required={"title", "content"},
 *   allOf={
 *       @SWG\Schema(ref="#/definitions/CreateNews"),
 *       @SWG\Schema(
 *           required={"id"},
 *           @SWG\Property(property="id", format="int64", type="integer")
 *       )
 *   }
 * )
 */

class News extends ActiveRecord
{
    public static function tableName()
    {
        return '{{%news}}';
    }

    public function rules()
    {
        return [
            [['title', 'content'], 'required'],
            ['title', 'string', 'max' => 255],
            ['content', 'string']
        ];
    }
}