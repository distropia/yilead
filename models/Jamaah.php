<?php

namespace app\models;

use yii\behaviors\TimestampBehavior;
use Yii;

/**
 * This is the model class for table "jamaah".
 *
 * @property integer $id
 * @property string $nama
 * @property integer $tanggal_lahir
 * @property string $jenis_kelamin
 * @property string $alamat
 * @property string $no_telp
 * @property string $email
 * @property string $pekerjaan
 * @property string $pendidikan
 * @property integer $created_at
 * @property integer $updated_at
 *
 * @property Lembaga[] $lembagas
 */
class Jamaah extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'jamaah';
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
            [['nama', 'jenis_kelamin', 'alamat', 'no_telp', 'email'], 'required'],
            [['tanggal_lahir', 'created_at', 'updated_at'], 'integer'],
            [['alamat'], 'string'],
            [['nama', 'email'], 'string', 'max' => 64],
            [['jenis_kelamin'], 'string', 'max' => 1],
            [['no_telp'], 'string', 'max' => 15],
            [['pekerjaan', 'pendidikan'], 'string', 'max' => 32],
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
            'tanggal_lahir' => 'Tanggal Lahir',
            'jenis_kelamin' => 'Jenis Kelamin',
            'alamat' => 'Alamat',
            'no_telp' => 'No Telp',
            'email' => 'Email',
            'pekerjaan' => 'Pekerjaan',
            'pendidikan' => 'Pendidikan',
            'created_at' => 'Created At',
            'updated_at' => 'Updated At',
        ];
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getLembagas()
    {
        return $this->hasMany(Lembaga::className(), ['relawan' => 'id']);
    }
}
