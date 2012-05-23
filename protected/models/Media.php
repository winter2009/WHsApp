<?php

/**
 * This is the model class for table "mc_media".
 *
 * The followings are the available columns in table 'mc_media':
 * @property integer $id
 * @property string $media_name
 * @property string $media_url
 * @property string $media_created
 * @property string $media_modified
 * @property string $media_description
 * @property integer $sub_category_id
 *
 * The followings are the available model relations:
 * @property SubCategory $subCategory
 */
class Media extends CActiveRecord
{
	/**
	 * Returns the static model of the specified AR class.
	 * @param string $className active record class name.
	 * @return Media the static model class
	 */
	public static function model($className=__CLASS__)
	{
		return parent::model($className);
	}

	/**
	 * @return string the associated database table name
	 */
	public function tableName()
	{
		return 'mc_media';
	}

	/**
	 * @return array validation rules for model attributes.
	 */
	public function rules()
	{
		// NOTE: you should only define rules for those attributes that
		// will receive user inputs.
		return array(
			array('media_name, media_url, sub_category_id', 'required'),
			array('sub_category_id', 'numerical', 'integerOnly'=>true),
			array('media_name, media_url, media_created, media_modified, media_description', 'length', 'max'=>255),
			// The following rule is used by search().
			// Please remove those attributes that should not be searched.
			array('id, media_name, media_url, media_created, media_modified, media_description, sub_category_id', 'safe', 'on'=>'search'),
		);
	}

	/**
	 * @return array relational rules.
	 */
	public function relations()
	{
		// NOTE: you may need to adjust the relation name and the related
		// class name for the relations automatically generated below.
		return array(
			'subCategory' => array(self::BELONGS_TO, 'SubCategory', 'sub_category_id'),
		);
	}

	/**
	 * @return array customized attribute labels (name=>label)
	 */
	public function attributeLabels()
	{
		return array(
			'id' => 'ID',
			'media_name' => 'Media Name',
			'media_url' => 'Media Url',
			'media_created' => 'Media Created',
			'media_modified' => 'Media Modified',
			'media_description' => 'Media Description',
			'sub_category_id' => 'Sub Category',
		);
	}

	/**
	 * Retrieves a list of models based on the current search/filter conditions.
	 * @return CActiveDataProvider the data provider that can return the models based on the search/filter conditions.
	 */
	public function search()
	{
		// Warning: Please modify the following code to remove attributes that
		// should not be searched.

		$criteria=new CDbCriteria;

		$criteria->compare('id',$this->id);
		$criteria->compare('media_name',$this->media_name,true);
		$criteria->compare('media_url',$this->media_url,true);
		$criteria->compare('media_created',$this->media_created,true);
		$criteria->compare('media_modified',$this->media_modified,true);
		$criteria->compare('media_description',$this->media_description,true);
		$criteria->compare('sub_category_id',$this->sub_category_id);

		return new CActiveDataProvider($this, array(
			'criteria'=>$criteria,
		));
	}
}