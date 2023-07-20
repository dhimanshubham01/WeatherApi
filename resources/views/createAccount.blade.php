<html>
    <head>
        <title>index page</title>
    </head>
    <style>
        span{
                color:red;
                font-size:16px
            }
    </style>
    <body>
        <div>
            
            <form action="/index/createAccount/insert" method="post">
                @csrf
                <lable>Username</lable>
                <input type="text" name="username" value = "{{ old('username') }}">
                <span>
                    @error('username')
                    {{$message}}
                    @enderror                    
                </span><br><br>
                <lable>E-mail</lable>
                <input type="text" name="email" value = "{{ old('email') }}">
                <span>
                    @error('email')
                    {{$message}}
                    @enderror                    
                </span><br><br>
                <lable>phone Number</lable>
                <input type="text" name="phone_no" value = "{{ old('phone_no') }}">
                <span>
                    @error('phone_no')
                    {{$message}}
                    @enderror                    
                </span><br><br>
                <lable>Password</lable>
                <input type="password" name="password">
                <span>
                    @error('password')
                    {{$message}}
                    @enderror                    
                </span><br><br>
                <lable>Confirm Password</lable>
                <input type="password" name="confirm_password">
                <span>
                    @error('confirm_password')
                    {{$message}}
                    @enderror                    
                </span><br><br>
                <button type="submit" name="sbmt">Submit</button>
            </form>
        </div>
</html>
