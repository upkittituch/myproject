@extends('layouts.app')

@section('content')
<h3>thankyou</h3>
<script src="https://static.line-scdn.net/liff/edge/versions/2.4.1/sdk.js"></script>

<script>

liff.closeWindow();
function closeWin() {
  myWindow.close();   // Closes the new window
}
</script>
@endsection
