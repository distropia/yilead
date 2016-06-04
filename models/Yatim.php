<?php

namespace app\models;

use yii\behaviors\TimestampBehavior;
use Yii;

/**
 * This is the model class for table "yatim".
 *
 * @property integer $id
 * @property integer $lembaga
 * @property string $nama
 * @property string $tempat_lahir
 * @property integer $tanggal_lahir
 * @property string $jenis_kelamin
 * @property string $nama_ayah
 * @property string $nama_ibu
 * @property string $nomor_kk
 * @property integer $ukuran_baju
 * @property integer $ukuran_sepatu
 * @property integer $created_at
 * @property integer $updated_at
 *
 * @property Lembaga $lembaga0
 */
class Yatim extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'yatim';
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
            [['lembaga', 'nama', 'tempat_lahir', 'tanggal_lahir', 'jenis_kelamin'], 'required'],
            [['lembaga', 'tanggal_lahir', 'ukuran_baju', 'ukuran_sepatu', 'created_at', 'updated_at'], 'integer'],
            [['nama', 'tempat_lahir', 'nama_ayah', 'nama_ibu'], 'string', 'max' => 64],
            [['jenis_kelamin'], 'string', 'max' => 1],
            [['nomor_kk'], 'string', 'max' => 20],
            [['lembaga'], 'exist', 'skipOnError' => true, 'targetClass' => Lembaga::className(), 'targetAttribute' => ['lembaga' => 'id']],
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'lembaga' => 'Lembaga',
            'nama' => 'Nama',
            'tempat_lahir' => 'Tempat Lahir',
            'tanggal_lahir' => 'Tanggal Lahir',
            'jenis_kelamin' => 'Jenis Kelamin',
            'nama_ayah' => 'Nama Ayah',
            'nama_ibu' => 'Nama Ibu',
            'nomor_kk' => 'Nomor Kk',
            'ukuran_baju' => 'Ukuran Baju',
            'ukuran_sepatu' => 'Ukuran Sepatu',
            'created_at' => 'Created At',
            'updated_at' => 'Updated At',
        ];
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getLembaga0()
    {
        return $this->hasOne(Lembaga::className(), ['id' => 'lembaga']);
    }
}
