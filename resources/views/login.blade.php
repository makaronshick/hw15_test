<form method="post" action="/login">
    @csrf
    <div class="mb-3">
        <label for="username" class="form-label">Username</label>
        <input type="text" value="{{ $data['username'] ?? '' }}" class="form-control @if($errors->has('username')) is-invalid @endif" name="username" id="username">
        <div class="invalid-feedback">
            {{ $errors->first('username') }}
        </div>
    </div>
    <div class="mb-3">
        <label for="password" class="form-label">Password</label>
        <input type="password" class="form-control @if($errors->has('password')) is-invalid @endif" name="password" id="password">
        <div class="invalid-feedback">
            {{ $errors->first('password') }}
        </div>
    </div>
    <input type="submit" class="btn btn-primary" value="Login"/>
</form>
