<?php


namespace ronashdkl\kodCms\modules\admin\controllers;


use ronashdkl\kodCms\modules\admin\models\Log;
use RecursiveDirectoryIterator;
use RecursiveIteratorIterator;
use yii\base\DynamicModel;
use yii\helpers\FileHelper;
use yii\helpers\Html;
use yii\helpers\VarDumper;
use yii\web\Controller;
use yii\web\UploadedFile;
use ZipArchive;

class BackupController extends Controller
{
    public function actionIndex($download = false,$name=false)
    {
        if($name){
            $zipfile = \Yii::getAlias('@app/storage/'.$name);
        }else{
            $zipfile = \Yii::getAlias('@app/storage/data_backup.zip');
        }
        if ($download && $name) {

            if (file_exists($zipfile)) {
                header('Content-Description: File Transfer');
                header('Content-Type: application/octet-stream');
                header('Content-Disposition: attachment; filename='.$name);
                header('Expires: 0');
                header('Cache-Control: must-revalidate');
                header('Pragma: public');
                header('Content-Length: ' . filesize($zipfile));
                flush(); // Flush system output buffer
                readfile($zipfile);
                exit;
            }
        }
        $form = new DynamicModel(['file']);
        $form->addRule(['file'], 'file', ['skipOnEmpty' => false, 'extensions' => 'zip']);
        if ($form->load(\Yii::$app->request->post())) {
            $zip = UploadedFile::getInstance($form, 'file');

            if ($zip->baseName != 'data_backup' || $zip->extension != 'zip') {
                \Yii::$app->session->setFlash('error', 'Not valid backup file. File name should be data_backup.zip');
                return $this->redirect('index');
            }
            if(!is_file($zipfile)){
                \Yii::$app->session->setFlash('error', 'Please create backup first');
                return $this->redirect('index');
            }
            $msg = $this->unzip($zip->tempName);
            \Yii::$app->session->setFlash('info', $msg);
            return $this->redirect('/admin/backup');
        }
        return $this->render('index', ['model' => $form]);

    }



    public function unzip($file)
    {
        $zip = new ZipArchive;
        $res = $zip->open($file);
        if ($res === TRUE) {
            $dir = \Yii::getAlias('@app/storage/data');
            if(!is_dir($dir)){
               mkdir($dir);
            }
            $zip->extractTo($dir);
            $zip->close();
            return 'Successfully restore backup file';


        } else {
            \Yii::$app->session->setFlash('error', 'Restore not complete');
            return  'Restore not complete';

        }
    }

    public function actionData()
    {
        $request = \Yii::$app->request;
        $file = \Yii::getAlias('@app/storage/data_backup.zip');
        $root = \Yii::getAlias('@app/storage/data');
        if (is_file($file)) {
            unlink($file);
        }
        $zip = new ZipArchive();
        if ($zip->open($file, ZipArchive::CREATE) !== TRUE) {
            throw new \Exception('Cannot create a backup file');
        }
        $files = new RecursiveIteratorIterator(

            new RecursiveDirectoryIterator($root),

            RecursiveIteratorIterator::LEAVES_ONLY

        );
        foreach ($files as $file) {
            if (!$file->isDir()) {
                $filePath = $file->getRealPath();
                $relativePath = substr($filePath, strlen($root) + 1);
                $zip->addFile($filePath, $relativePath);
            }
        }

        $zip->close();
        $log = new Log();
        $log->log = "New Data Backup created!";
        $log->save();
        $this->redirect('index');
    }
    public function actionMedia()
    {
        $request = \Yii::$app->request;
        $file = \Yii::getAlias('@webroot/media/media_backup.zip');
        $root = \Yii::getAlias('@webroot/media');
        if (is_file($file)) {
            unlink($file);
        }
        $zip = new ZipArchive();
        if ($zip->open($file, ZipArchive::CREATE) !== TRUE) {
            throw new \Exception('Cannot create a backup file');
        }
        $files = new RecursiveIteratorIterator(

            new RecursiveDirectoryIterator($root),

            RecursiveIteratorIterator::LEAVES_ONLY

        );
        foreach ($files as $file) {
            if (!$file->isDir()) {
                $filePath = $file->getRealPath();
                $relativePath = substr($filePath, strlen($root) + 1);
                $zip->addFile($filePath, $relativePath);
            }
        }

        $zip->close();
        $log = new Log();
        $log->log = "New Media Backup created!";
        $log->save();
        $this->redirect('index');
    }
}