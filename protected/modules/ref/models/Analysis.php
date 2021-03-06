<?php

/**
 * This is the model class for table "analysis".
 *
 * The followings are the available columns in table 'analysis':
 * @property integer $id
 * @property integer $sample_id
 * @property integer $methodReference_id
 * @property integer $status_id
 * @property string $create_time
 * @property string $update_time
 *
 * The followings are the available model relations:
 * @property Sample $sample
 */
class Analysis extends CFormModel
{
	public $id;
	public $sample_id;
	public $testName_id;
	public $methodReference_id;
	public $fee; 
	public $status_id; 
	public $create_time; 
	public $update_time;
	
	/**
	 * @return string the associated database table name
	 */
	/*public function tableName()
	{
		return 'analysis';
	}*/

	/**
	 * @return array validation rules for model attributes.
	 */
	public function rules()
	{
		// NOTE: you should only define rules for those attributes that
		// will receive user inputs.
		return array(
			//array('sample_id, methodReference_id, status_id, create_time, update_time', 'required'),
			array('sample_id, testName_id, methodReference_id, fee', 'required'),
			array('id, sample_id, methodReference_id, status_id', 'numerical', 'integerOnly'=>true),
			// The following rule is used by search().
			// @todo Please remove those attributes that should not be searched.
			array('id, sample_id, testName_id ,methodReference_id, status_id, create_time, update_time', 'safe', 'on'=>'search'),
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
			'sample' => array(self::BELONGS_TO, 'Sample', 'sample_id'),
		);
	}

	/**
	 * @return array customized attribute labels (name=>label)
	 */
	public function attributeLabels()
	{
		return array(
			'id' => 'ID',
			'sample_id' => 'Sample',
			'testName_id' => 'Analysis',
			'methodReference_id' => 'Method Reference',
			'fee' => 'Fee',
			'status_id' => 'Status',
			'create_time' => 'Create Time',
			'update_time' => 'Update Time',
		);
	}

	/**
	 * Retrieves a list of models based on the current search/filter conditions.
	 *
	 * Typical usecase:
	 * - Initialize the model fields with values from filter form.
	 * - Execute this method to get CActiveDataProvider instance which will filter
	 * models according to data in model fields.
	 * - Pass data provider to CGridView, CListView or any similar widget.
	 *
	 * @return CActiveDataProvider the data provider that can return the models
	 * based on the search/filter conditions.
	 */
	public function search()
	{
		// @todo Please modify the following code to remove attributes that should not be searched.

		$criteria=new CDbCriteria;

		$criteria->compare('id',$this->id);
		$criteria->compare('sample_id',$this->sample_id);
		$criteria->compare('methodReference_id',$this->methodReference_id);
		$criteria->compare('fee',$this->fee);
		$criteria->compare('status_id',$this->status_id);
		$criteria->compare('create_time',$this->create_time,true);
		$criteria->compare('update_time',$this->update_time,true);

		return new CActiveDataProvider($this, array(
			'criteria'=>$criteria,
		));
	}

	/**
	 * @return CDbConnection the database connection used for this class
	 */
	/*public function getDbConnection()
	{
		return Yii::app()->referralDb;
	}*/

	/**
	 * Returns the static model of the specified AR class.
	 * Please note that you should have this exact method in all your CActiveRecord descendants!
	 * @param string $className active record class name.
	 * @return Analysis the static model class
	 */
	public static function model($className=__CLASS__)
	{
		return parent::model($className);
	}
}
