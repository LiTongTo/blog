<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>
</head>
<body>
     <form action="{{url('/student/store')}}" method="post">
         @csrf
         <table>
              <tr>
                  <td>学生姓名</td>
                  <td><input type="text" name="s_name"></td>
              </tr>
              <tr>
                  <td>学生性别</td>
                  <td>
                      <input type="radio" name="s_sex" value='1'>男
                      <input type="radio" name="s_sex" value='2'>女
                  </td>
              </tr>
              <tr>
                  <td>学生班级</td>
                  <td>
                       @foreach($ClassInfo as $v)
                         <option value="{{$v->c_id}}">{{$v->c-name}}</option>
                       @foreach
                  </td>
              </tr>
              <tr>
                   <td><input type="submit" value="提交"></td>
              </tr>
         </table>
     </form>
</body>
</html>