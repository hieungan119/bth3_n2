@if ($errors->any())
    <div style='color:red;width:30%; margin:0 auto'>
      <div >
        {{ __('Whoops! Something went wrong.') }}
      </div>
      <ul>
        @foreach ($errors->all() as $error)
          <li>{{ $error }}</li>
        @endforeach
      </ul>
    </div>
  @endif
  @if (session('status'))
    <div class="alert alert-success">
      {{ session('status') }}
    </div>
@endif
<x-account-panel>
<form method = 'post' action="{{route('saveinfo')}}" enctype="multipart/form-data" style='width:30%; margin:0 auto'>
<div style='text-align:center;font-weight:bold;color:#15c;'>CẬP NHẬT THÔNG TIN CÁ NHÂN</div>
<label>Tên</label>
<input type='text' class='form-control form-control-sm' name='name' value="{{$user->name}}">
<label>Email</label>
<input type='text' class='form-control form-control-sm' name='email' value="{{$user->email}}">
<label>Số điện thoại</label>
<input type='text' class='form-control form-control-sm' name='phone' value="{{$user->phone}}">
<label>Ảnh đại diện</label><br>
<img src="{{ asset('storage/profile/'.$user->photo) }}" width="70px" class="mb-2" style="border-radius: 5px; border: 1px solid #ddd;">
<input type="file" name="photo" id="photo" accept="image/*" class="form-control-file">
<input type ='hidden' value='{{$user->id}}' name='id'>
{{ csrf_field() }}
<div style='text-align:center;'><input type='submit' class='btn btn-primary mt-1' value='Lưu'></div>
</form>
</x-account-panel>