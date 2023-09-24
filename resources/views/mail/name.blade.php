<!DOCTYPE html>
<html lang="en">

<body>
    <div>
        <h1>user email verification</h1>
        <p>hello {{ $student->name }}</p>
        <p>please click the button to verify your email address</p>
        <a href="{{ URL::temporarySignedRoute('verification.verify', mom()->addMinute(30), ['id' => $student->id]) }}" class="button button-primary" target="">
          Verify Email Address
        </a>
        <button type="button"> click to verify</button>
    </div>
</body>
</html>