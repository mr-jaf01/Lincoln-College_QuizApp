@if($status == 1)
<center><span class='p-3 bg-green-400 rounded text-center '>Student Register Successfully</span></center>
<script>window.location.href="{{route('auth.login')}}"</script>
@endif

@if($status == 2)
    <center><span class="p-3 bg-red-400 text-center rounded">Email already Registered</span></center>
@endif

@if($status == 3)
<center><span class="p-3 bg-red-400 text-center rounded">Password & Comfirm Password Mismatch</span></center>
@endif