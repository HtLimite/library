<?php

namespace App\Http\Controllers\Library;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use function dd;
use function session;

//登录用户
class UserInfoController extends Controller
{
//        | GET|HEAD  | userInfo                 | userInfo.index
//        | POST      | userInfo                 | userInfo.store  头像上传
public function store(Request $request){
    $file = $request->file()['myfile'];
    //是否存在
    if($file == '') return 0;
    //是否有效
    if(!$file->isValid()) return 0;
    //用户信息 分割
    $user = explode('@',session('email'));
    //qq号
    $user = $user[0];
    //判断目录是否存在
    if(file_exists("./Uploads/{$user}")){
        //删除旧头像 保留 6
        $oldP1 = scandir("./Uploads/{$user}");
        $oldP = array_slice($oldP1,2,-5);
        for ($i = 0 ;$i < count($oldP);$i ++){
            unlink("./Uploads/{$user}/{$oldP[$i]}");
        }

    }else{
        //0777 权限
        mkdir("./Uploads/{$user}",0777,true);
    }
    //验证文件格式 图片                 先得到文件后缀,然后将后缀转换成小写,然后看是否在和图片的数组内
    if(!in_array( strtolower($file->extension()),['bmp','jpg','png','tif','gif','pcx','tga','exif','fpx','svg','psd','cdr','pcd','dxf','ufo','eps','ai','raw','WMF','webp','avif','apng'])){
        return 0;
    }
    //重命名文件
    $fileName = time().".".$file->getClientOriginalExtension();
    //文件路径
    $filePath = "./Uploads/{$user}/".$fileName;
    //存入用户信息
    if(! DB::table('student')->where('email',session('email'))->update(['avatar' => $filePath])) return 0;
    //移动文件 重命名
    $file->move("./Uploads/{$user}",$fileName);
    return ['filePath'=>$filePath];
}
//        | GET|HEAD  | userInfo/create          | userInfo.create
//        | GET|HEAD  | userInfo/{userInfo}      | userInfo.show
//        | PUT|PATCH | userInfo/{userInfo}      | userInfo.update
public function update(Request $request)
{
    $file = $request->input();
    dd($request->file());

}






//        | DELETE    | userInfo/{userInfo}      | userInfo.destroy
//        | GET|HEAD  | userInfo/{userInfo}/edit | userInfo.edit
public function edit(Request $request){
    $file = $request->input();
    dd($request->file());
}
}
