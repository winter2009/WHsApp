<?php

/**
 * This is the model class for table "mc_event".
 *
 * The followings are the available columns in table 'mc_event':
 * @property integer $id
 * @property string $event_name
 * @property string $event_date
 * @property string $event_venue
 * @property string $event_image
 * @property string $event_detail
 * @property string $event_created
 */
class Event extends CActiveRecord
{
	/**
	 * Returns the static model of the specified AR class.
	 * @param string $className active record class name.
	 * @return Event the static model class
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
		return 'mc_event';
	}

	/**
	 * @return array validation rules for model attributes.
	 */
	public function rules()
	{
		// NOTE: you should only define rules for those attributes that
		// will receive user inputs.
		return array(
			array('event_name, event_date, event_created', 'required'),
			array('event_name, event_date, event_venue, event_image', 'length', 'max'=>255),
			array('event_detail', 'safe'),
			// The following rule is used by search().
			// Please remove those attributes that should not be searched.
			array('id, event_name, event_date, event_venue, event_image, event_detail, event_created', 'safe', 'on'=>'search'),
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
		);
	}

	/**
	 * @return array customized attribute labels (name=>label)
	 */
	public function attributeLabels()
	{
		return array(
			'id' => 'ID',
			'event_name' => 'Event Name',
			'event_date' => 'Event Date',
			'event_venue' => 'Event Venue',
			'event_image' => 'Event Image',
			'event_detail' => 'Event Detail',
			'event_created' => 'Event Created',
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
		$criteria->compare('event_name',$this->event_name,true);
		$criteria->compare('event_date',$this->event_date,true);
		$criteria->compare('event_venue',$this->event_venue,true);
		$criteria->compare('event_image',$this->event_image,true);
		$criteria->compare('event_detail',$this->event_detail,true);
		$criteria->compare('event_created',$this->event_created,true);

		return new CActiveDataProvider($this, array(
			'criteria'=>$criteria,
		));
	}
}