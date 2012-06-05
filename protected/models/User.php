<?php

/**
 * This is the model class for table "mc_user".
 *
 * The followings are the available columns in table 'mc_user':
 * @property integer $id
 * @property string $email
 * @property string $password
 * @property string $created
 * @property string $modified
 * @property integer $role_id
 * @property string $salt
 * @property string $nick_name
 */
class User extends CActiveRecord
{
    public $password_repeat;
    
	/**
	 * Returns the static model of the specified AR class.
	 * @param string $className active record class name.
	 * @return User the static model class
	 */
	public static function model($className=__CLASS__)
	{
		return parent::model($className);
	}

    public static function generateSalt()
    {
        return "$2a$07$".md5(mcrypt_create_iv(22, MCRYPT_DEV_URANDOM))."$";
    }
    
	/**
     * perform one-way encryption on the password before we store it in the database
     */
    protected function afterValidate()
    {
        parent::afterValidate();
        $this->password = $this->encrypt($this->password);
    }
    
    public function validatePassword($password)
    {
        return $this->encrypt($password) === $this->password;
    }
    
    public function encrypt($value)
    {
        return crypt($value, $this->salt);
    }

	/**
	 * @return string the associated database table name
	 */
	public function tableName()
	{
		return 'mc_user';
	}

	/**
	 * @return array validation rules for model attributes.
	 */
	public function rules()
	{
		// NOTE: you should only define rules for those attributes that
		// will receive user inputs.
		return array(
			array('email, password, role_id, nick_name', 'required'),
            array('password', 'compare'),
            array('email', 'unique'),
            array('password_repeat, salt', 'safe'),
			array('role_id', 'numerical', 'integerOnly'=>true),
			array('email, password, created, modified, nick_name', 'length', 'max'=>255),
			array('salt', 'length', 'max'=>64),
			// The following rule is used by search().
			// Please remove those attributes that should not be searched.
			array('id, email, password, created, modified, role_id, salt, nick_name', 'safe', 'on'=>'search'),
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
            'role' => array(self::BELONGS_TO, 'Role', 'role_id')
		);
	}

	/**
	 * @return array customized attribute labels (name=>label)
	 */
	public function attributeLabels()
	{
		return array(
			'id' => 'ID',
			'email' => 'Email',
			'password' => 'Password',
			'created' => 'Created',
			'modified' => 'Modified',
			'role_id' => 'Role',
			'salt' => 'Salt',
			'nick_name' => 'Nick Name',
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
		$criteria->compare('email',$this->email,true);
		$criteria->compare('password',$this->password,true);
		$criteria->compare('created',$this->created,true);
		$criteria->compare('modified',$this->modified,true);
		$criteria->compare('role_id',$this->role_id);
		$criteria->compare('salt',$this->salt,true);
		$criteria->compare('nick_name',$this->nick_name,true);

		return new CActiveDataProvider($this, array(
			'criteria'=>$criteria,
		));
	}
}