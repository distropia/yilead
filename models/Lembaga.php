<?php

namespace app\models;

use yii\behaviors\TimestampBehavior;
use Yii;

/**
 * This is the model class for table "lembaga".
 *
 * @property integer $id
 * @property string $nama
 * @property string $alamat
 * @property string $koordinator
 * @property string $no_telp
 * @property string $pj_data
 * @property integer $relawan
 * @property string $keterangan
 * @property integer $created_at
 * @property integer $updated_at
 *
 * @property Jamaah $relawan0
 * @property Yatim[] $yatims
 */
class Lembaga extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'lembaga';
    }

    public function behaviors()
    {
        return [
            TimestampBehavior::className(),
        ];
    }
    
    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['nama', 'alamat', 'koordinator', 'no_telp', 'pj_data'], 'required'],
            [['alamat'], 'string'],
            [['relawan', 'created_at', 'updated_at'], 'integer'],
            [['nama', 'koordinator', 'pj_data', 'keterangan'], 'string', 'max' => 64],
            [['no_telp'], 'string', 'max' => 15],
            [['relawan'], 'exist', 'skipOnError' => true, 'targetClass' => Jamaah::className(), 'targetAttribute' => ['relawan' => 'id']],
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'nama' => 'Nama',
            'alamat' => 'Alamat',
            'koordinator' => 'Koordinator',
            'no_telp' => 'No Telp',
            'pj_data' => 'Pj Data',
            'relawan' => 'Relawan',
            'keterangan' => 'Keterangan',
            'created_at' => 'Created At',
            'updated_at' => 'Updated At',
        ];
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getRelawan0()
    {
        return $this->hasOne(Jamaah::className(), ['id' => 'relawan']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getYatims()
    {
        return $this->hasMany(Yatim::className(), ['lembaga' => 'id']);
    }
}
