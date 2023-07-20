<html>
    <head>
        <title>Login page</title>
    </head>
    <body>
        <div>
            <form action="/index/forgotpswd/updt/set" method="post">
                @csrf
                <lable>User Name</lable>
                <input type="text" name="uname" placeholder="enter Username" value="{{$username}}" readonly><br><br>
                <lable>Password</lable>
                <input type="password" name="pwd" placeholder="enter password" ><br><br> 
                <lable>E-mail</lable>
                <input type="text" name="email" value = "{{$email}}"><br><br>
                <lable>phone Number</lable>
                <input type="text" name="phone_no" value="{{$ph_no}}"><br><br>
                <button type="submit">Submit</button>
            </form>
        </div>
       
</html>
