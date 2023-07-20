<html>
    <head>
        <title>Login page</title>
    </head>
    <body>
        <div>
            <form action="/index/forgotpswd/updt" method="post">
                @csrf
                <lable>Email OR Mobile Number</lable>
                <input type="text" name="forgot" placeholder="enter Email OR Mobile Number"><br><br>
                <button type="submit">Search</button>
            </form>
        </div>
    
</html>
