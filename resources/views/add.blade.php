<form method="post" action="{{url('/add')}}">
  @csrf
  <input type="text" name="name">
  <button>提交</button>
</form>