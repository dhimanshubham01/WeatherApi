<html>
    <head>
        <title>Login page</title>
    </head>
    <body>
        <div>
            <form action="/index/login/check" method="post">
                @csrf
                <lable>User Name</lable>
                <input type="text" name="username" placeholder="enter Username">
                <span style="color:red;">
                    @error('username')
                    {{$message}}
                    @enderror                    
                </span><br><br>
                <lable>Password</lable>
                <input type="text" name="pwd" placeholder="enter password">
                <span style="color:red;">
                    @error('pwd')
                    {{$message}}
                    @enderror                    
                </span><br><br> 
                <button type="submit">Submit</button>
            </form>
        </div>
        <div>
            <a href="/index/forgotpswd">Forgot password??</a>
        </div>
</html>
