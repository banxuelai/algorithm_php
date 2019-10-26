<?php

if ( ! function_exists('displayJson'))
{
    /**
     * 抛出 Json
     * @param $data
     */
    function displayJson($data)
    {
        //header("Content-type: application/json; charset=utf-8", TRUE);
        echo json_encode($data); exit;
    }
}

/**
 * @desc 随机图片
 * @param int $len
 */
function random_string($len = 8)
{
    $pool = '0123456789abcdefghijklmnopqrstuvwxyzABCDEFGHIJKLMNOPQRSTUVWXYZ';

    $str = '';
    for ($i=0; $i < $len; $i++)
    {
        $str .= substr($pool, mt_rand(0, strlen($pool) -1), 1);
    }
    return $str;
}

/**
 * 获取文件后缀名
 *
 * @param string $filename
 * @return string
 */
function getFileExt($filename)
{
    $extend = explode ( ".", $filename);
    $va = count ( $extend ) - 1;
    return $va > 0 ? strtolower ( $extend [$va] ) : '';
}

/** 通用上传图片
 * @param $file
 * @return array
 */
function imageUpload($file)
{
    # 取得8位的随机数
    $rand = random_string(16);
    # 取得图片的扩展名称
    if (empty($file['name'])) {
        return array('code' => 0, 'message' => '请检查图片格式,大小,是否满足条件', 'data' => array());
    }
    $ext  = strtolower(getFileExt($file['name']));
    $date = date('Y/m/d', time());

    $fileName = "{$date}/{$rand}.{$ext}";

    # 判断图片格式，并给出提示：请上传JPG.GIF.PNG.JPEG格式图片
    if(! in_array($ext, array('jpg', 'jpeg', 'gif', 'png',"JPG"))) {
        return array('code' => 0, 'message' => '请上传JPG.GIF.PNG.JPEG格式图片', 'data' => array());
    }

    $binImg = file_get_contents($file['tmp_name']);
    if ((strlen($binImg)/(1024*1024)) > 5) {
        return array('code' => 0, 'message' => '请上传小于5M', 'data' => array());
    }

    $url = $fileName;

    $filepath = 'upload/' . $url;
    $dir = dirname($filepath);

    if(! file_exists($dir)) {
        mkdir($dir, 0777, true);
    }

    file_put_contents($filepath, $binImg);

    $url  = 'http://localhost/test/upload/'.$url;

    return array('code' => 1, 'message' => 'ok', 'data' => array('image_url' => $url));
}

// 执行上传
$return = imageUpload((empty($_FILES["upload"]) ? "" : $_FILES["upload"]));
displayJson($return);


